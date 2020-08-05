@extends('bootstrap')

@section('title', 'Product List')

@section('jumbotron')
<h1 class="display-4">Product List</h1>
<p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
@endsection

@section('content')
<div class="row">
    <aside class="col-md-3">
        <div class="card">
            <div class="card-body">
                <p><a href="{{ route('product_all') }}">All Items <span
                            class="badge badge-secondary badge-pill">{{ $categories->sum('products_count') }}</span></a>
                </p>
                <ul>
                    @foreach ($categories as $category)
                    <li><a href="{{ route('product_category', ['CategoryId' => $category->CategoryId]) }}">{{ $category->CategoryName }}
                            <span class="badge badge-secondary badge-pill">{{ $category->products_count }}</span></a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </aside>
    <main class="col-md-9">
        <h1>{{ $categoryName }}</h1>
        <form action="{{ route('cart_post') }}" method="post">
            {{ csrf_field() }}
            @if ($categoryId > 0)
            <input type="hidden" name="categoryId" value="{{ $categoryId }}">
            @endif
            @foreach ($products as $product)
            <article class="card card-product-list">
                <div class="card-body row">
                    <aside class="col-md-3">
                        <a href="#" class="img-wrap">
                            <img src="{{ asset('/img/thumbnail/' . $product->ImagePath) }}"
                                alt="{{ $product->ProductName }}">
                        </a>
                    </aside>
                    <div class="col-md-6">
                        <div class="info-main">
                            <a href="#" class="h5 title">{{ $product->ProductName }}</a>
                            <p>{{ $product->Description }}</p>
                        </div>
                    </div>
                    <aside class="col-sm-3">
                        <div class="info-aside">
                            <div>
                                <span class="h5"> ${{ $product->UnitPrice }} </span>
                            </div>
                            <p class="text-success">{{ $product->category->CategoryName }}</p>
                            <br>
                            <p>
                                <button class="btn btn-primary btn-block" type="submit" name="ProductId"
                                    value="{{ $product->ProductId }}">Add to Cart</button>
                            </p>
                        </div>
                    </aside>
                </div>
            </article>
            @endforeach
        </form>
    </main>
</div>
@endsection
