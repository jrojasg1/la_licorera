<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('productAdmin.title');
        $viewData['products'] = Product::all();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = __('productAdmin.create');

        return view('admin.product.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {

        Product::validate($request);

        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setType($request->input('type'));
        $newProduct->setDescription($request->input('description'));
        $content = $request->input('alcoholContent');
        $newProduct->setAlcoholContent(intval($content));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setStock($request->input('stock'));
        $newProduct->setImage('licor.png');
        $newProduct->save();

        if ($request->hasFile('image')) {
            $imageName = $newProduct->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }

        return redirect()->route('admin.product.index');
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin Page - Edit Product - Online Store';
        $viewData['product'] = Product::findOrFail($id);

        return view('admin.product.edit')->with('viewData', $viewData);

    }

    public function update(Request $request, string $id): RedirectResponse
    {
        Product::validate($request);
        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));

        if ($request->hasFile('image')) {
            $imageName = $product->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        }
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function delete(string $id): RedirectResponse
    {
        Product::destroy($id);

        return redirect()->route('admin.product.index');
    }
}
