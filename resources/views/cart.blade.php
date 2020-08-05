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
                    @foreach ($cartitems as $cartitem)
                    <tr>
                        <td>
                            <figure class="itemside">
                                <div class="aside"><img
                                        src="{{ asset('/img/thumbnail/' . $cartitem->product->ImagePath) }}"
                                        height="40"></div>
                                <figcaption class="info">
                                    <a href="#" class="title text-dark">{{ $cartitem->product->ProductName }}</a>
                                </figcaption>
                            </figure>
                        </td>
                        <td>
                            <select class="form-control">
                                @for ($i = 1; $i <= $cartitem->Quantity; $i++)
                                    <option @if ($i===$cartitem->Quantity) selected @endif >{{ $i }}</option>
                                    @endfor
                            </select>
                        </td>
                        <td>
                            <div class="price-wrap">
                                <var class="price">{{ $cartitem->getPrice() }}</var>
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
                <!--
                <a href="#" class="btn btn-primary float-md-right"> Make Purchase <i class="fa fa-chevron-right"></i>
                </a>
                -->
                <form action="{{ route('order_exec') }}" method="post">
                    {{ csrf_field() }}
                    <button class="btn btn-primary float-md-right" type="submit">Make Purchase <i
                            class="fa fa-chevron-right"></i></button>
                </form>
                <a href="Product.html" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
            </div>
        </div>
    </main>
    <aside class="col-md-3">
        <div class="card">
            <div class="card-body">
                <dl class="dlist-align">
                    <dt>Total price:</dt>
                    <dd class="text-right">USD {{ $cartitems->map(function ($i) { return $i->getPrice(); })->sum() }}
                    </dd>
                </dl>
                <dl class="dlist-align">
                    <dt>Shipping:</dt>
                    <dd class="text-right">USD 658</dd>
                </dl>
                <dl class="dlist-align">
                    <dt>Total:</dt>
                    <dd class="text-right  h5">
                        <strong>${{ 658 + $cartitems->map(function ($i) { return $i->getPrice(); })->sum() }}</strong>
                    </dd>
                </dl>
            </div>
        </div>
    </aside>
</div>
@endsection
