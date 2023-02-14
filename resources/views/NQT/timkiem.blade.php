@extends ("NQT.index")
@section('noidung')
<div class="beta-products-list">
							<h4>Sản phẩm tìm thấy</h4>
							<div class="beta-products-details">
								<p class="pull-left">
								Tìm thấy {{count($product_search)}} sản phẩm
								</p>
								<div class="clearfix"></div>
							</div>

							<div class="row d-inline-flex" >
								@foreach($product_search as $np )
								<div class="col-sm-3" style="padding-top:10px">
									<div class="single-item">
										@if($np->promotion_price !=0 )
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										@endif
										<div class="single-item-header" >
											<a href="{{route('chitiet',$np->id)}}" style="margin: auto!important"><img style="height: 270px!important"  src="source/image/product/{{$np->image}}" alt=""></a>
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
						</div> <!-- .beta-products-list -->
						<div class="space20">&nbsp;</div>
@endsection