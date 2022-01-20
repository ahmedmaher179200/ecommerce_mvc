<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <?php 
            $orders = App\models\Orderdetail::whereHas('Product',function($q){
              $q->where('vendor_id','=', auth('vendor')->user()->id);
            })->get();
          ?>
          <li class=" nav-item"><a href="{{url('/vendor/orders')}}"><i class="la ft-user"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('front.Oreders') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{$orders->count()}}</span></a>
            <ul class="menu-content">
              <li @if ($page == "orderShow") class="active" @endif><a class="menu-item" href="{{url('vendor/orders')}}" data-i18n="nav.dash.ecommerce">{{ trans('admin.show all') }}</a>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="{{url('/vendor/items')}}"><i class="la ft-user"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('vendor.Items') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{App\models\Product::where('vendor_id', '=', auth()->user()->id)->count()}}</span></a>
            <ul class="menu-content">
              <li @if ($page == "itemShow") class="active" @endif><a class="menu-item" href="{{url('vendor/items')}}" data-i18n="nav.dash.ecommerce">{{ trans('admin.show all') }}</a>
              </li>
              <li @if ($page == "addItem") class="active" @endif><a class="menu-item" href="{{url('vendor/items/addItem')}}" data-i18n="nav.dash.ecommerce">{{ trans('admin.add') }}</a>
              </li>
            </ul>
          </li>

      </ul>
    </div>
</div>