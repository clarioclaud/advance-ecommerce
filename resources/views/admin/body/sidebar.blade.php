@php 
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>Flip</b> Shop</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		    <li class="{{ $route == 'dashboard'?'active':'' }}">
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			        <span>Dashboard</span>
          </a>
        </li>  

        @php
          $brands = (auth()->guard('admin')->user()->brands == 1);
          $categories = (auth()->guard('admin')->user()->categories == 1);
          $products = (auth()->guard('admin')->user()->products == 1);
          $slider = (auth()->guard('admin')->user()->slider == 1);
          $coupons = (auth()->guard('admin')->user()->coupons == 1);
          $shipping = (auth()->guard('admin')->user()->shipping == 1);
          $blog = (auth()->guard('admin')->user()->blog == 1);
          $site = (auth()->guard('admin')->user()->site == 1);
          $returnorders = (auth()->guard('admin')->user()->returnorders == 1);
          $review = (auth()->guard('admin')->user()->review == 1);
          $orders = (auth()->guard('admin')->user()->orders == 1);
          $stock = (auth()->guard('admin')->user()->stock == 1);
          $reports = (auth()->guard('admin')->user()->reports == 1);
          $allusers = (auth()->guard('admin')->user()->allusers == 1);
          $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
        @endphp
		
        @if($brands == true)
        <li class="treeview {{ $prefix=='/brands'?'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'admin.brands' ? 'active':'' }}"><a href="{{ route('admin.brands') }}"><i class="ti-more"></i>All Brands</a></li>
            
          </ul>
        </li> 
        @else
        @endif

        @if($categories == true)
        <li class="treeview {{ $prefix=='/categories'?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='admin.categories'?'active':'' }}"><a href="{{ route('admin.categories')}}"><i class="ti-more"></i>All Categories</a></li>
            <li class="{{ $route=='admin.subcategory'?'active':'' }}"><a href="{{ route('admin.subcategory') }}"><i class="ti-more"></i>All Subcategories</a></li>
            <li class="{{ $route=='admin.subsubcategory'?'active':'' }}"><a href="{{ route('admin.subsubcategory') }}"><i class="ti-more"></i>All Sub->Subcategory</a></li>
          </ul>
        </li>
        @else
        @endif

        @if($products == true)
		
        <li class="treeview {{ $prefix=='/products'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='add.product'?'active':'' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>
            <li class="{{ $route=='manage.product'?'active':'' }}"><a href="{{ route('manage.product')}}"><i class="ti-more"></i>Manage Products</a></li>
          
          </ul>
        </li> 	
        @else
        @endif

        @if($slider == true)

        <li class="treeview {{ $prefix=='/slider'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Sliders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='manage.slider'?'active':'' }}"><a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
          </ul>
        </li> 	
        @else
        @endif

        @if($coupons == true)

        <li class="treeview {{ $prefix=='/coupons'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='manage.coupon'?'active':'' }}"><a href="{{ route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
          </ul>
        </li> 
        @else
        @endif

        @if($shipping == true)

        <li class="treeview {{ $prefix=='/shipping'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='manage.division'?'active':'' }}"><a href="{{ route('manage.division') }}"><i class="ti-more"></i>Shipping Divisions</a></li>
            <li class="{{ $route=='manage.district'?'active':'' }}"><a href="{{ route('manage.district') }}"><i class="ti-more"></i>Shipping Districts</a></li>
            <li class="{{ $route=='manage.state'?'active':'' }}"><a href="{{ route('manage.state') }}"><i class="ti-more"></i>Shipping State</a></li>
          </ul>
        </li> 	
        @else
        @endif

        @if($blog == true)
        
        <li class="treeview {{ $prefix=='/blog'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Blog Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='manage.blog.category'?'active':'' }}"><a href="{{ route('manage.blog.category') }}"><i class="ti-more"></i>Manage Blog Category</a></li>
            <li class="{{ $route=='blog.post.list'?'active':'' }}"><a href="{{ route('blog.post.list') }}"><i class="ti-more"></i>View Blog Post</a></li>
            <li class="{{ $route=='blog.post.add'?'active':'' }}"><a href="{{ route('blog.post.add') }}"><i class="ti-more"></i>Add Blog Post</a></li>
          </ul>
        </li> 
        @else
        @endif

        @if($site == true)

        <li class="treeview {{ $prefix=='/site'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Site Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='manage.site.settings'?'active':'' }}"><a href="{{ route('manage.site.settings') }}"><i class="ti-more"></i>Site Settings</a></li>       
          </ul>
          <ul class="treeview-menu">
            <li class="{{ $route=='manage.seo.settings'?'active':'' }}"><a href="{{ route('manage.seo.settings') }}"><i class="ti-more"></i>Seo Settings</a></li>        
          </ul>
        </li> 
        @else
        @endif

        @if($returnorders == true)

        <li class="treeview {{ $prefix=='/return'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Return Order Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='manage.return.request'?'active':'' }}"><a href="{{ route('manage.return.request') }}"><i class="ti-more"></i>Return Request</a></li>       
          </ul>
          <ul class="treeview-menu">
            <li class="{{ $route=='all.return.request'?'active':'' }}"><a href="{{ route('all.return.request') }}"><i class="ti-more"></i>All Request</a></li>        
          </ul>
        </li> 
        @else
        @endif

        @if($review == true)

        <li class="treeview {{ $prefix=='/review'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Manage Review</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='manage.pending.review'?'active':'' }}"><a href="{{ route('manage.pending.review') }}"><i class="ti-more"></i>Pending Reviews</a></li>       
          </ul>
          <ul class="treeview-menu">
            <li class="{{ $route=='manage.publish.review'?'active':'' }}"><a href="{{ route('manage.publish.review') }}"><i class="ti-more"></i>Publish Reviews</a></li>        
          </ul>
        </li> 
        @else
        @endif

		 
        <li class="header nav-small-cap">User Interface</li>
        @if($orders == true)
        <li class="treeview {{ $prefix=='/orders'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='pending.orders'?'active':'' }}"><a href="{{ route('pending.orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
            <li class="{{ $route=='confirmed.orders'?'active':'' }}"><a href="{{ route('confirmed.orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>
            <li class="{{ $route=='processing.orders'?'active':'' }}"><a href="{{ route('processing.orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
            <li class="{{ $route=='picked.orders'?'active':'' }}"><a href="{{ route('picked.orders') }}"><i class="ti-more"></i>Picked Orders</a></li>
            <li class="{{ $route=='shipped.orders'?'active':'' }}"><a href="{{ route('shipped.orders') }}"><i class="ti-more"></i>Shipped Orders</a></li>
            <li class="{{ $route=='delivered.orders'?'active':'' }}"><a href="{{ route('delivered.orders') }}"><i class="ti-more"></i>Delivered Orders</a></li>
            <li class="{{ $route=='cancel.orders'?'active':'' }}"><a href="{{ route('cancel.orders') }}"><i class="ti-more"></i>Cancel Orders</a></li>
          </ul>
        </li> 
        @else
        @endif

        @if($stock == true)
        <li class="treeview {{ $prefix=='/stock'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Store Stock Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='product.stock'?'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Stock Products</a></li>
          </ul>
        </li> 
        @else
        @endif

        @if($reports == true)
		
        <li class="treeview {{ $prefix=='/reports'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>All Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='reports.all'?'active':'' }}"><a href="{{ route('reports.all') }}"><i class="ti-more"></i>All Reports</a></li>
          </ul>
        </li> 
        @else
        @endif

        @if($allusers == true)

        <li class="treeview {{ $prefix=='/allusers'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>All Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='all.user'?'active':'' }}"><a href="{{ route('all.user') }}"><i class="ti-more"></i>All Users</a></li>
          </ul>
        </li> 
        @else
        @endif

        @if($adminuserrole == true)
		  
        <li class="treeview {{ $prefix=='/adminuserrole'?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Admin User Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route=='admin.user.role'?'active':'' }}"><a href="{{ route('admin.user.role') }}"><i class="ti-more"></i>All Admin User</a></li>
          </ul>
        </li> 
        @else
        @endif
       		  		  
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
