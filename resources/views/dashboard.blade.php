<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                            @foreach($products as $product)
                                <h1>Products:</h1>
                                <h1 style="font-size: 18px">{{ $product->name }} - {{ $product->price/100 }} €</h1>
                                <form method="POST" action="{{ route('dashboard.addToCart') }}">
                                    @csrf
                                    <label>
                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                    </label>
                                    <label>
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                    </label>
                                    <label>
                                        <input style="max-width: 80px" type="number" min="1"
                                               max="{{ $product->quantity }}" name="orderQuantity" value="1">
                                    </label>
                                    <button style="font-size: 12px" type="submit">Add to cart
                                    </button>
                                </form>
                            @endforeach
                        </div>
                        <div style="width: 300px">
                            <h1 style="font-size: 20px">Cart:</h1>
                            @foreach($cartProducts as $cartProduct)
                                @if($cartProduct->userId == \Illuminate\Support\Facades\Auth::id())
                                    @foreach($products as $product)
                                        @if($product->id == $cartProduct->productId)
                                            <div
                                                style="display: flex; flex-direction: row; justify-content: space-between">
                                                <div
                                                    style="display: flex; flex-direction: row; justify-content: space-between">
                                                    <h1>{{ $product->name }}</h1>
                                                    <form method="POST" action="{{ route('dashboard.editCart') }}">
                                                        @csrf
                                                        <label>
                                                            <input type="number"
                                                                   style="margin-left: 5px; width: 40px; padding: 0"
                                                                   name="quantity"
                                                                   value="{{ $cartProduct->quantity }}">
                                                        </label>
                                                        <input type="hidden" name="cartId"
                                                               value="{{ $cartProduct->id }}">
                                                        <button style="font-size: 12px" type="submit">Edit
                                                        </button>
                                                    </form>
                                                </div>
                                                <form method="POST" action="{{ route('dashboard.removeFromCart') }}">
                                                    @csrf
                                                    <input type="hidden" name="cartProductId"
                                                           value="{{ $cartProduct['id'] }}">
                                                    <button style="font-size: 12px" type="submit">Remove product
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            <div style="display: flex; flex-direction: row; justify-content: space-between">
                                <div>
                                    <h1 style="font-size: 18px">Subtotal:</h1>
                                    <h1> {{ $cartTotal / 100 / 100}} €</h1>
                                </div>
                                <div>
                                    <h1 style="font-size: 18px">VAT total:</h1>
                                    <h1> {{ $cartTotal/100/100*21 / 100}} €</h1>
                                </div>
                                <div>
                                    <h1 style="font-size: 18px">Total:</h1>
                                    <h1> {{ ($cartTotal/100 + $cartTotal/100/100*21) / 100}} €</h1>
                                </div>
                                <div style="padding-top: 20px">
                                    <form method="POST" action="{{ route('dashboard.purchase') }}">
                                        @csrf
                                        <input type="hidden" name="userId"
                                               value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                                        <button style="font-size: 12px" type="submit">Purchase
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
