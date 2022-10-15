<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 style="font-size: 20px">Add product:</h1>
                    <form method="POST" action="{{ route('product.store') }}">
                        @csrf
                        <input type="text" name="productName" placeholder="Product Name">
                        <input type="number" name="productQuantity" placeholder="Product Quantity">
                        <input type="number" name="productPrice" placeholder="Product Price">
                        <button type="submit" name="addProduct">Add Product</button>
                    </form>
                    <h1 style="font-size: 20px; margin-top: 10px">Product list:</h1>
                    @foreach($products as $product)
                        <h1 style="font-size: 18px">{{ $product['name'] }} {{ $product['quantity'] }} {{ $product['price']/100 }}</h1>
                        <div style="display: flex; flex-direction: row; justify-content: space-between; width: 180px">
                            <div style="margin-left: 10px">
                                <form method="POST" action="{{ route('product.deleteProduct') }}">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{ $product['id'] }}">
                                    <button style="font-size: 12px" type="submit">Remove product
                                    </button>
                                </form>
                            </div>
                            <div>
                                <form method="POST" action="{{ route('product.editProduct') }}">
                                    @csrf
                                    <label>
                                        <input name="productId" type="hidden" value="{{ $product['id'] }}">
                                    </label>
                                    <button style="font-size: 12px;" type="submit">Edit Product
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
