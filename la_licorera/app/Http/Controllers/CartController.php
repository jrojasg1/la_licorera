<?php 
    namespace App\Http\Controllers;


    use Illuminate\View\View;
    use Illuminate\Http\Request;
    use Illuminate\Http\RedirectResponse;
    use App\Models\User;
    use App\Models\Recipe;
    use App\Models\Product;
    use App\Models\Order; 
    use App\Models\Item; 
    use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function purchase(Request $request)
    { 
        $productsInSession = $request->session()->get("cart_product_data"); 
        if ($productsInSession) { 
            $userId = Auth::user()->getId(); 
            $order = new Order(); 
            $order->setState('');
            $order->setUserId($userId); 
            $order->setTotal(0); 
            $order->save(); 
            
            $total = 0; 
            $productsInCart = Product::findMany(array_keys($productsInSession)); 
            foreach ($productsInCart as $product) { 
                $amount = $productsInSession[$product->getId()]; 
                $item = new Item(); 
                $item->setAmount($amount); 
                $item->setSubtotal($product->getPrice()); 
                $item->setProductId($product->getId()); 
                $item->setOrderId($order->getId()); 
                $item->save(); 
                $total = $total + ($product->getPrice()*$amount); 
                $currentStock=$product->getStock();
                $newStock=$currentStock - $amount;
                $product->setStock($newStock);
                $product->save();
            } 
            $order->setTotal($total); 
            $order->setState("Pendiente"); 
            $order->save(); 
            $newBalance = Auth::user()->getWallet() - $total; 
            Auth::user()->setWallet($newBalance); 
            Auth::user()->save(); 
            
            $request->session()->forget('cart_product_data'); 
            
            $viewData = []; 
            $viewData["title"] = "Purchase - Online Store"; 
            $viewData["subtitle"] = "Purchase Status"; 
            $viewData["order"] = $order; 
            return view('cart.purchase')->with("viewData", $viewData); 
        } else { 
            return redirect()->route('cart.index'); 
        } 
    } 

        public function index(Request $request):View
        {
           /* $products=Product::all();
            $cartProducts=[];
            $cartProductData=$request->session()->get('cart_product_data');
            if($cartProductData){
                foreach($products as $product){
                    if(in_array($product->getId(),array_keys($cartProductData))){
                        $amount=$cartProductData[$product->getId()]['amount'];
                        $cartProducts[$product->getId()]=['product'=>$product,'amount'=>$amount];
                    }
                }
            }
            $viewData=[];
            $viewData['title']='Cart';
            $viewData['subtitle']='shoping cart';
            $viewData['cartProducts']=$cartProducts;
            return view('cart.cart')->with('viewData',$viewData);*/
            $total = 0;
            $productsInCart = [];
            $productsInSession = $request->session()->get("cart_product_data");
            if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
            }
            $viewData = [];
            $viewData["title"] = "Cart - Online Store";
            $viewData["subtitle"] = "Shopping Cart";
            $viewData["total"] = $total;
            $viewData["products"] = $productsInCart;
            
            return view('cart.index')->with("viewData", $viewData);
        }
    
        public function add(string $id,Request $request): RedirectResponse
        {
            $cartProductData=$request->session()->get('cart_product_data');
            $amount=$request->input('amount');
            $cartProductData[$id]=intval($amount);
            $request->session()->put('cart_product_data',$cartProductData);

            return redirect()->route('cart.index');
        }

        public function removeAll(Request $request):RedirectResponse
        {
            $request->session()->forget('cart_product_data');
            return redirect()->route('cart.index');
        }
    }