@extends ("NQT.index")
@extends ("NQT.sliderloai")
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
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($phan_loai as $loai)
							<li><a href="{{route('loaisp',$loai->id)}}">{{$loai->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm {{$tenloai->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										@if($sp->promotion_price !=0 )
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitiet',$sp->id)}}" style="margin: auto!important"><img style=";height: 250px!important"  src="source/image/product/{{$sp->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price" style="font-size: 15px;">
												@if($sp->promotion_price ==0)
												<span class="flash-sale">{{number_format($sp->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($sp->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($sp->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption" style="margin-top: 10px;margin-bottom: 10px!important">
											<a class="add-to-cart pull-left" href="{{route('themgiohang', $sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitiet',$sp->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$sp_theoloai->links('pagination::bootstrap-4')}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $spk)
								<div class="col-sm-4">
									<div class="single-item">
										@if($spk->promotion_price !=0 )
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitiet',$spk->id)}}" style="margin: auto!important"><img style=";height: 250px!important"  src="source/image/product/{{$spk->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spk->name}}</p>
											<p class="single-item-price" style="font-size: 15px;">
												@if($spk->promotion_price ==0)
												<span class="flash-sale">{{number_format($spk->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($spk->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($spk->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption" style="margin-top: 10px;margin-bottom: 10px!important">
											<a class="add-to-cart pull-left" href="{{route('themgiohang', $spk->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitiet',$spk->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							{{$sp_khac->links('pagination::bootstrap-4')}}
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection