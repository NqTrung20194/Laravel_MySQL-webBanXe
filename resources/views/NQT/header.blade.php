
<div id="header">
		<div class="header-bottom" style="background-color: #CC0000;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="{{route('index')}}"><span class='beta-menu-toggle-text'></span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('index')}}">Trang chủ</a></li>
						<li><a >Loại sản phẩm</a>
							<ul class="sub-menu">
								@foreach($phanloai as $pl )
								<li><a href="{{route('loaisp',$pl->id)}}">{{$pl->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
						<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
						
					</ul>

					<div class="clearfix"></div>
				</nav>
				
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
	
		<div class="container beta-relative">
			<div class="pull-right auto-width-right">
	<ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                	<!-- /.phân quyền user -->
                	@if (Auth::check())
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Chào bạn {{Auth::user()->full_name}}<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    	@if(Auth::user()->level <=2)
						<li><a href="{{route('admin')}}">Quản Lý Trang</a></li>
						@else
						<li><a href="{{route('index')}}">Trang chủ</a></li>
						@endif
						<li><a href="{{route('logout')}}">Đăng xuất</a></li>
					</ul>
						@else
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                    	</a>
                    <ul class="dropdown-menu dropdown-user">
						<li><a href="{{route('signup')}}">Đăng kí</a></li>
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
					</ul>
						@endif
                    
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
	</div>
				<div class="pull-right beta-components space-left ov">
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
							{{csrf_field()}}
					        <input type="text" value="" name="search" id="tim" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

<div class="beta-comp">
	<div class="cart">
		<div class="beta-select">
			<i class="fa fa-shopping-cart">
			 Giỏ hàng (
				@if(Session::has('cart'))
				    {{Session('cart')->totalQty}}
				@else 
				
				    Trống 
				@endif) </i>
				<i class="fa fa-chevron-down"></i></div>
				@if(Session::has('cart'))
		<div class="beta-dropdown cart-body">
				
					   <div class="cart-item">
							<div class="media">
								@if(Session::has('cart'))
					@foreach($product_cart as $product)
								<a class="pull-left" href="{{route('chitiet',$product['item']['id'])}}"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											<span class="cart-item-amount">
											{{$product['qty']}}*
											<span >
									@if ($product['item']['promotion_price']==0)
										{{number_format($product['item']['unit_price'])}}
									@else
									    {{number_format($product['item']['promotion_price'])}}											
									@endif
											</span>
											<span style="margin-left: 30px;">

												<a class="cart-total text-right" href="{{route('themgiohang',$product['item']['id'])}}"><i class="fa fa-plus"></i>|</a>
												<a class="cart-total text-right" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-minus"></i>|</a>
												

												<a class="cart-total text-right" href="{{route('xoa',$product['item']['id'])}}"><i class="fa fa-times"></i></a>


												<!---{{route('xoagiohang',$product['item']['id'])}}--->
											</span>
										</span>


										</div>
					@endforeach
							</div>
						</div>
					

								<div class="cart-caption">

									
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} Đồng</span></div>
									@endif
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('delall')}}" class="beta-btn primary text-center">Xóa tất cả <i class="fa fa-chevron-right"></i></a>

										<a href="{{route('checkout')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
							@endif
						</div> <!-- .cart -->
				
					</div>
				</div>

				<div class="clearfix"></div>
			</div> <!-- .container -->

	
	<div class="space5">&nbsp;</div>
	
				