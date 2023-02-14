@extends ("NQT.index")

@section('noidung')

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					
					<div class="row">
						<div class="col-sm-4">
							@if($tt_sanpham->promotion_price !=0)
								<div class="ribbon-wrapper">
								<div class="ribbon sale">Sale</div>
								</div>
							@endif
							<img src="source/image/product/{{$tt_sanpham->image}}" width="450px">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$tt_sanpham->name}}</p>
											<p class="single-item-price" style="font-size: 15px;">
												@if($tt_sanpham->promotion_price ==0)
												<span class="flash-sale">{{number_format($tt_sanpham->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($tt_sanpham->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($tt_sanpham->promotion_price)}} đồng</span>
												@endif
											</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<p>Lựa chọn thêm:</p>
							<div class="single-item-options">
								<form action="{{route('additems')}}" method="post">
									{{csrf_field()}}
								<label>Số lượng:</label>
								<input type="text" name="soluong" style="width: 50px" placeholder="1">
								<button type="submit" class="add-to-cart" name="id" value="{{$tt_sanpham->id}}"><i class="fa fa-shopping-cart"></i></button>
						<!---		<a class="add-to-cart" href="{{route('themgiohang', $tt_sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
							--->
								</form>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Views ({{$tt_sanpham->view}})
								/Sale ({{$tt_sanpham->sale}})</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$tt_sanpham->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm liên quan</h4>
						<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_lienquan)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

						<div class="row">
							@foreach($sp_lienquan as $splq )
								<div class="col-sm-4">
									<div class="single-item">
										@if($splq->promotion_price !=0 )
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitiet',$splq->id)}}" style="margin: auto!important"><img style="width: 260px;height: 215px!important"  src="source/image/product/{{$splq->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$splq->name}}</p>
											<p class="single-item-price" style="font-size: 15px;">
												@if($splq->promotion_price ==0)
												<span class="flash-sale">{{number_format($splq->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($splq->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($splq->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption" style="margin-top: 10px;margin-bottom: 10px!important">
											<a class="add-to-cart pull-left" href="{{route('themgiohang', $splq->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitiet',$splq->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>									
								</div>
								@endforeach								
						</div>
						<div class="row">{{$sp_lienquan->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sale as $s)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitiet',$s->id)}}"><img src="source/image/product/{{$s->image}}"></a>
									<div class="media-body">
										<span style="display: block!important"> {{$s->name}}</span>
										<span class="beta-sales-price" style="font-size: 15px!important">
										@if($s->promotion_price ==0)
												<span class="flash-sale">{{number_format($s->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($s->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($s->promotion_price)}} đồng</span>
												@endif
										</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Top Views</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($view as $v)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitiet',$v->id)}}"><img src="source/image/product/{{$v->image}}"></a>
									<div class="media-body">
										{{$v->name}}
										<span class="beta-sales-price" style="font-size: 15px!important">
										@if($v->promotion_price ==0)
												<span class="flash-sale">{{number_format($v->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($v->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($v->promotion_price)}} đồng</span>
												@endif
										</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection