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
            <li class="active">
                <a href="{{url('admins')}}"><i class="fa fa-users"></i><span>dashboard</span></a>
            </li>
            @if (auth('admin')->user()->isAbleTo('read-admins'))
                <li class="">
                    <a href="{{url('admins/admins')}}"><i class="fa fa-users"></i><span>admins</span></a>
                </li>
            @endif
            @if (auth('admin')->user()->isAbleTo('read-products'))
                <li class="">
                    <a href="{{url('admins/products')}}"><i class="fa fa-users"></i><span>products</span></a>
                </li>
            @endif
            @if (auth('admin')->user()->isAbleTo('read-reviews'))
                <li class="">
                    <a href="{{url('admins/reviews')}}"><i class="fa fa-users"></i><span>reviews</span></a>
                </li>
            @endif
        </ul>
    </section>

</aside>
