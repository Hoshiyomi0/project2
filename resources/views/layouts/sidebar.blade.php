<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('user.png') }} " class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ \Auth::user()->name  }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="active"><a href="{{ route('user.index') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
            <li class="active"><a href="{{ route('categories.index') }}"><i class="fa fa-list"></i> <span>Categories</span></a></li>
            <li class="active"><a href="{{ route('products.index') }}"><i class="fa fa-cubes"></i> <span>Product</span></a></li>
            <li class="active"><a href="{{ route('customers.index') }}"><i class="fa fa-users"></i> <span>Customer</span></a></li>
            <li class="active"><a href="{{ route('suppliers.index') }}"><i class="fa fa-truck"></i> <span>Supplier</span></a></li>
            <li class="active"><a href="{{ route('productsOut.index') }}"><i class="fa fa-dollar"></i> <span>Sales</span></a></li>
            <li class="active"><a href="{{ route('productsIn.index') }}"><i class="fa fa-plus"></i> <span>Stock In</span></a></li>
            <li class="active"><a href="{{ route('drivers.index') }}"><i class="fa fa-truck"></i> <span>Drivers</span></a></li>
            <li class="active"><a href="{{ route('disposal.index') }}"><i class="fa fa-trash"></i> <span>Dispose</span></a></li>
        </ul>
    </section>
</aside>
