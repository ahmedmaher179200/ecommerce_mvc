<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <?php 
            $orders = App\Models\Orderdetail::whereHas('Product',function($q){
              $q->where('vendor_id','=', auth('vendor')->user()->id);
            })->get();
          ?>
          <li class=" nav-item"><a href="{{url('/vendors/orders')}}"><i class="la ft-user"></i><span class="menu-title" data-i18n="nav.dash.main">Oreders</span><span class="badge badge badge-info badge-pill float-right mr-2">{{$orders->count()}}</span></a>
            <ul class="menu-content">
              <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/vendors/orders')? 'active':''}}"><a class="menu-item" href="{{url('vendors/orders')}}" data-i18n="nav.dash.ecommerce">show all</a>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="{{url('/vendors/products')}}"><i class="la ft-user"></i><span class="menu-title" data-i18n="nav.dash.main">products</span><span class="badge badge badge-info badge-pill float-right mr-2">{{App\models\Product::where('vendor_id', '=', auth()->user()->id)->count()}}</span></a>
            <ul class="menu-content">
              <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/vendors/products')? 'active':''}}"><a class="menu-item" href="{{url('vendors/products')}}" data-i18n="nav.dash.ecommerce">show all</a>
              </li>
              <li class="{{request()->is(LaravelLocalization::getCurrentLocale().'/vendors/addProduct')? 'active':''}}"><a class="menu-item" href="{{url('vendors/products/addProduct')}}" data-i18n="nav.dash.ecommerce">add</a>
              </li>
            </ul>
          </li>

      </ul>
    </div>
</div>