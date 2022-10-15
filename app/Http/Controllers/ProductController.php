<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteProduct;
use App\Jobs\EditProduct;
use App\Jobs\StoreProduct;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function create()
    {
        return view('product', [
            'products' => Product::select("*")->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'productName' => ['required'],
            'productQuantity' => ['required'],
            'productPrice' => ['required'],
        ]);

        $this->dispatch(new StoreProduct(
            $request->get('productName'),
            (integer)$request->get('productQuantity'),
            $request->get('productPrice'),
        ));

        return Redirect::route('product');
    }

    public function deleteProduct(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'productId' => ['required'],
        ]);

        $this->dispatch(new DeleteProduct($request->get('productId')));

        return Redirect::route('product');
    }

    public function editProduct(Request $request): view
    {
        return view('editProduct', [
            'product' => Product::select('*')->where('id', $request->get('productId'))->get(),
        ]);
    }

    public function commitProductChanges(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'productName' => ['required'],
            'productQuantity' => ['required'],
            'productPrice' => ['required'],
        ]);

        $this->dispatch(new EditProduct(
            $request->get('productId'),
            $request->get('productName'),
            $request->get('productQuantity'),
            $request->get('productPrice')
        ));

        return Redirect::route('product');
    }
}
