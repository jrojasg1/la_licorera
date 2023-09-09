<?php 
    namespace App\Http\Controllers;
    use Illuminate\View\View;
    use Illuminate\View\Request;
    use Illuminate\View\RedirectResponse;
    use App\Models\User;
    use App\Models\Recipe;
    class RecipeController extends Controller{
        public function index(Request $request):View
        {
            $products=Product::all();
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
            return view('cart.cart')->with('viewData',$viewData);
        }
    
        public function add(string $id, int $amount,Request $request):RedirectResponse
        {
            $cartProductData=$request->session()->get('cart_product_data');
            $cartProductData[$id]=['amount'=>$amount];
            $request->session()->put('cart_product_data',$cartProductData);
            return back();
        }
        public function removeAll(Request $request):RedirectResponse
        {
            $request->session()->forget('cart_product_data');
            return back();
        }
        public function buy(Request $request):RedirectResponse
        {
            $cartProductData=$request->session()->get('cart_product_data');
            $newOrder = new Order();
            $newOrder->setState('enviando');
            $newOrder->setDeliveryDate('??');
            $newOrder->setTotal(5);
            $userId=auth()->user()->id;
            $newOrder->setUserId($userId);
            $newOrder->save();
            foreach($cartProductData as $productId){
                $newItem=new Item();
                $newItem->setProductId($productId);
                $newItem->setOrderId($newOrder->getId());
                $newItem->setAmount(1);
                $newItem->setSubtotal(1);
                $newItem->save();
            }
            
            return back();
        }
    }