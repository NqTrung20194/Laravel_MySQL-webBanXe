@extends ("NQT.index")
@extends ("NQT.slider")
@section('noidung')


<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
					<div class="col-sm-12">
						
						<div class="beta-products-list row">
							<div class="col-sm-12"  style="background-color: #DE6161;  padding:0px;width: 100%!important ">
								<div >
						<div class="col-sm-5" align="center">	<h2 style="padding-top: 50%; color:#FFFFFF; "><b>SẢN PHẨM MỚI</b></h2> </div>

							
				<div class="row col-sm-7" style="padding: 0px; margin: auto; height: 450px; overflow: auto!important">
							<div class="col-sm-12 row" style="background-color: #FFFFFF;width: 100%; padding: 0; margin: 0!important" >

							<div class="  card-columns" style="margin: auto!important" >
								@foreach($new_products as $np )
								<div class="col-sm-6" style="padding-top:10px">
									<div class="single-item">
										@if($np->promotion_price !=0 )
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										@endif
										<div class="single-item-header" >
											<a href="{{route('chitiet',$np->id)}}" style="margin: auto!important"><img style="width: 260px;height: 215px!important"  src="source/image/product/{{$np->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$np->name}}</p>
											<p class="single-item-price" style="font-size: 15px;">
												@if($np->promotion_price ==0)
												<span class="flash-sale">{{number_format($np->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($np->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($np->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('themgiohang', $np->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chitiet',$np->id)}}">Chi Tiết<i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
									</div>
								</div>
								@endforeach
							</div>
							</div>
							
						</div> <!-- .beta-products-list -->
							</div>
							</div>
							<div class="row pull-right">{{$new_products->links('pagination::bootstrap-4')}}</div>
						<div class="space50">&nbsp;</div>
						<div class="fullwidthbanner-container" >
								 <img width="100%" style="margin:  50px 0px;" src="source/image/panel/honda7.jpg">
							</div>
							<div class="space50">&nbsp;</div>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($pro_products)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							
						<div class="beta-products-list row">
						
							<div class="col-sm-12"  style="background-color: #999da0;  padding:0px;width: 100%!important ">
							<div class="row">
								<div class="row col-sm-7" style="background-color: #ffffff; padding-left: :10px; margin: auto; height: 450px; overflow: auto!important">
								@foreach($pro_products as $pro_p )
								<div class="col-sm-6 " style="margin-bottom: 10px!important">
									<div class="single-item">
										@if($pro_p->promotion_price !=0 )
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitiet',$pro_p->id)}}" style="margin: auto!important"><img style="width: 260px;height: 215px!important"  src="source/image/product/{{$pro_p->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pro_p->name}}</p>
											<p class="single-item-price" style="font-size: 15px;">
												@if($pro_p->promotion_price ==0)
												<span class="flash-sale">{{number_format($pro_p->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($pro_p->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($pro_p->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('themgiohang', $pro_p->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chitiet',$pro_p->id)}}">Chi Tiết<i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
									</div>
								</div>
								@endforeach
								</div>	
								<div class="col-sm-5" align="center">	<h2 style="padding-top: 50%; color:#FFFFFF; "><b>SẢN PHẨM KHUYẾN MÃI</b></h2> </div>							
							</div>
						</div>
						<div class="row">{{$new_products->links('pagination::bootstrap-4')}}</div>

							<div class="space40">&nbsp;</div>

							<div class="fullwidthbanner-container" >
								 <img width="100%" style="margin:  50px 0px;" src="source/image/panel/suzuki6.jpg">
							</div>
							<div class="space50">&nbsp;</div>
							
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($products)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row" style="background-color: #DE6161;  padding:0px;width: 100%!important ">
								<div class="col-sm-5" align="center">	<h2 style="padding-top: 50%; color:#FFFFFF; "><b>TOÀN BỘ SẢN PHẨM</b></h2> </div>
								<div class="col-sm-7 row" style="background-color: #ffffff; padding-left: 10px; margin:0 auto; height: 450px; overflow: auto!important">
								@foreach($products as $p )
								<div class="col-sm-6">
									<div class="single-item">
										@if($p->promotion_price !=0 )
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitiet',$p->id)}}" ><img style="max-width: 100%;height: 215px;margin:0 auto!important"  src="source/image/product/{{$p->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$p->name}}</p>
											<p class="single-item-price" style="font-size: 15px;">
												@if($p->promotion_price ==0)
												<span class="flash-sale">{{number_format($p->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($p->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($p->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang', $p->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitiet',$p->id)}}">Chi Tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								</div>
														
							</div>
							<div class="row pull-right">{{$products->links('pagination::bootstrap-4')}}</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection