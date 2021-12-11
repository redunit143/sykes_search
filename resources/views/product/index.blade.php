
        <h1>Products @include('product.part.add-product-button')</h1>
            @if (isset($products))
                @if ($products->count())
                    <h2>
                        Search Results
                     <!--     @include('property.part.search-form-button')  -->
                    </h2>
                    <ul class="list-group">
                    @foreach ($products as $product)
                        <li class="list-group-item">
                            <h3> {{ $product->name }}</h3>
                            @if ($product->description)
                                <div class="panel-body">
                                    <div class="panel">
                                        {{ $product->description }}
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach
                    </ul>
                    <br>
                    <div  class="pagination-x">
                    {{ $products->appends(request()->input())->links() }}
                    </div>
                @else
                    <p>

                        No products exist.

                    </p>
                @endif
            @endif

        @if (isset($feedback))
        <p>
            {{ $feedback }}
        </p>
        @endif
        @include('product.part.add-product-form')