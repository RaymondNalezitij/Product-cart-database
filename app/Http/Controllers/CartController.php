<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteCartProduct;
use App\Jobs\EditCartProduct;
use App\Jobs\PutProductInCart;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CartController extends Controller
{
    public function create(): view
    {
        $cartTotal = Cart::where('userId', Auth::id())->sum('totalPrice');

        return view('dashboard', [
            'products' => Product::select("*")->get(),
            'cartProducts' => Cart::where('userId', Auth::id())->get("*"),
            'cartTotal' => $cartTotal
        ]);
    }

    public function addToCart(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'productId' => ['required'],
            'orderQuantity' => ['required'],
            'price' => ['required'],
        ]);

        $this->dispatch(new PutProductInCart(
            Auth::id(),
            $request->get('productId'),
            (integer)$request->get('orderQuantity'),
            (integer)$request->get('price'),
        ));

        return Redirect::route('dashboard');
    }

    public function editCartProduct(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'quantity' => ['required'],
            'cartId' => ['required'],
        ]);

        $this->dispatch(new EditCartProduct(
            $request->get('quantity'),
            $request->get('cartId')
        ));

        return Redirect::route('dashboard');
    }

    public function removeFromCart(Request $request): RedirectResponse
    {
        $this->dispatch(new DeleteCartProduct($request->get('cartProductId')));

        return Redirect::route('dashboard');
    }

    public function makePurchase(Request $request): RedirectResponse
    {
        Cart::where('userId', $request->get('userId'))->Delete();

        return Redirect::route('dashboard');
    }
}
