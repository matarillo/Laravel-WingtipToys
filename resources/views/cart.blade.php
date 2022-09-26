@extends('bootstrap')

@section('title', 'Shopping Cart')

@section('jumbotron')
<h1 class="display-4">Shopping Cart</h1>
<p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
@endsection

@section('content')
<div class="row">
    <main class="col-md-9">
        <div class="card">
            <table class="table table-borderless table-shopping-cart">
                <thead class="text-muted">
                    <tr class="small text-uppercase">
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-right"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                    <?php $quantity = $cartItem->quantity ?>
                    <tr data-unitprice="{{ gettype($cartItem->product->unit_price) }}">
                        <td>
                            <figure class="itemside">
                                <div class="aside"><img src="{{ asset('/img/thumbnail/' . $cartItem->product->image_path) }}" height="40"></div>
                                <figcaption class="info">
                                    <a href="#" class="title text-dark">{{ $cartItem->product->name }}</a>
                                </figcaption>
                            </figure>
                        </td>
                        <td>
                            <select name="quantity" class="form-control">
                                @for ($i = 1; $i <= $quantity; $i++) <option @if ($i===$quantity) selected @endif>{{ $i }}</option>
                                    @endfor
                            </select>
                        </td>
                        <td>
                            <div class="price-wrap">
                                <var class="price">{{ $cartItem->getPrice() }}</var>
                            </div>
                        </td>
                        <td class="text-right">
                            <a href="" class="btn btn-light">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body border-top">
                <form action="{{ route('order.exec') }}" method="post">
                    {{ csrf_field() }}
                    <button class="btn btn-primary float-md-right" type="submit">Make Purchase <i class="fa fa-chevron-right"></i></button>
                </form>
                <a href="{{ route('product.all') }}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
            </div>
        </div>
    </main>
    <aside class="col-md-3">
        <div class="card">
            <div class="card-body">
                <dl class="dlist-align">
                    <dt>Total price:</dt>
                    <dd class="text-right">USD {{ $cartItems->map(function ($i) { return $i->getPrice(); })->sum() }}
                    </dd>
                </dl>
                <dl class="dlist-align">
                    <dt>Shipping:</dt>
                    <dd class="text-right">USD 658</dd>
                </dl>
                <dl class="dlist-align">
                    <dt>Total:</dt>
                    <dd class="text-right  h5">
                        <strong>${{ 658 + $cartItems->map(function ($i) { return $i->getPrice(); })->sum() }}</strong>
                    </dd>
                </dl>
            </div>
        </div>
    </aside>
</div>
@endsection