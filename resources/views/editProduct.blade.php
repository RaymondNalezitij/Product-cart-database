<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 style="font-size: 20px">Edit product:</h1>
                <form method="POST" action="{{ route('product.commitProductChanges') }}">
                    @csrf
                    <input name="productId" type="hidden" value="{{ $product[0]['id'] }}">
                    <input type="text" name="productName" value="{{ $product[0]['name'] }}">
                    <input type="number" name="productQuantity" value="{{ $product[0]['quantity'] }}">
                    <input type="number" name="productPrice" value="{{ $product[0]['price']/100 }}">
                    <button type="submit" >Edit Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
