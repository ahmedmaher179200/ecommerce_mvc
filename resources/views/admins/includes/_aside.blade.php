<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('public/uploads/admins/' . auth('admin')->user()->getImage())}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>ahmed maher</p>
                <a href="#"><i class="fa fa-circle text-success"></i>statue</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins')? 'active':''}}">
                <a href="{{url('admins')}}"><i class="fa fa-users"></i><span>dashboard</span></a>
            </li>
            @if (auth('admin')->user()->isAbleTo('read-admins'))
                <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins/admins')? 'active':''}}">
                    <a href="{{url('admins/admins')}}"><i class="fa fa-users"></i><span>admins</span></a>
                </li>
            @endif

            @if (auth('admin')->user()->isAbleTo('read-roles'))
                <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins/roles')? 'active':''}}">
                    <a href="{{url('admins/roles')}}"><i class="fa fa-users"></i><span>roles</span></a>
                </li>
            @endif

            @if (auth('admin')->user()->isAbleTo('read-categories'))
                <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins/main_categories')? 'active':''}}">
                    <a href="{{url('admins/main_categories')}}"><i class="fa fa-users"></i><span>main categories</span></a>
                </li>
            @endif

            @if (auth('admin')->user()->isAbleTo('read-categories'))
                <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins/sub_categories')? 'active':''}}">
                    <a href="{{url('admins/sub_categories')}}"><i class="fa fa-users"></i><span>sub categories</span></a>
                </li>
            @endif

            @if (auth('admin')->user()->isAbleTo('read-users'))
                <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins/users')? 'active':''}}">
                    <a href="{{url('admins/users')}}"><i class="fa fa-users"></i><span>users</span></a>
                </li>
            @endif

            @if (auth('admin')->user()->isAbleTo('read-vendors'))
                <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins/vendors')? 'active':''}}">
                    <a href="{{url('admins/vendors')}}"><i class="fa fa-users"></i><span>vendors</span></a>
                </li>
            @endif

            @if (auth('admin')->user()->isAbleTo('read-products'))
                <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins/products')? 'active':''}}">
                    <a href="{{url('admins/products')}}"><i class="fa fa-users"></i><span>products</span></a>
                </li>
            @endif

            @if (auth('admin')->user()->isAbleTo('read-orders'))
                <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins/orders')? 'active':''}}">
                    <a href="{{url('admins/orders')}}"><i class="fa fa-users"></i><span>orders</span></a>
                </li>
            @endif

            @if (auth('admin')->user()->isAbleTo('read-reviews'))
                <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins/reviews')? 'active':''}}">
                    <a href="{{url('admins/reviews')}}"><i class="fa fa-users"></i><span>reviews</span></a>
                </li>
            @endif
            
            @if (auth('admin')->user()->isAbleTo('read-promocodes'))
                <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/admins/promocodes')? 'active':''}}">
                    <a href="{{url('admins/promocodes')}}"><i class="fa fa-users"></i><span>promo codes</span></a>
                </li>
            @endif
        </ul>
    </section>

</aside>
