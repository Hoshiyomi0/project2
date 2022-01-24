@extends('layouts.master')

@section('top')
@endsection

@section('content')

<div class="row">
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ \App\User::count() }}</h3>

                <p>Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ \App\Category::count() }}<sup style="font-size: 20px"></sup></h3>

                <p>Category</p>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
            <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ \App\Product::count() }}</h3>
                <p>Product</p>
            </div>
            <div class="icon">
                <i class="fa fa-cubes"></i>
            </div>
            <a href="{{ route('products.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ \App\Customer::count() }}</h3>

                <p>Customer</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ route('customers.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-teal">
            <div class="inner">
                <h3>{{ \App\Supplier::count() }}<sup style="font-size: 20px"></sup></h3>

                <p>Supplier</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('suppliers.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-maroon">
            <div class="inner">
                <h3>{{ \App\Product_In::count() }}</h3>

                <p>Stock In</p>
            </div>
            <div class="icon">
                <i class="fa fa-plus"></i>
            </div>
            <a href="{{ route('productsIn.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-gray">
            <div class="inner">
                <h3>{{ \App\Product_Out::count()  }}</h3>

                <p>Sales</p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <a href="{{ route('productsOut.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-purple">
            <div class="inner">
                <h3>{{ \App\Driver::count()  }}</h3>

                <p>Driver</p>
            </div>
            <div class="icon">
                <i class="fa fa-truck"></i>
            </div>
            <a href="{{ route('drivers.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-grey">
            <div class="inner">
                <h3>{{ \App\Disposal::count() }}<sup style="font-size: 20px"></sup></h3>

                <p>Dispose</p>
            </div>
            <div class="icon">
                <i class="fa fa-trash"></i>
            </div>
            <a href="{{ route('disposal.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection

@section('top')
@endsection
