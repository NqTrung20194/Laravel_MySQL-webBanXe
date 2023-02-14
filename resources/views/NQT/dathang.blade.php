@extends ("NQT.index")
@section('noidung')

@if (! isset($thongbao))
{{$thongbao=""}}
@endif
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('index')}}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('postdathang')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>
						@if(Auth::check())
						<div class="form-block">
								<label for="name">Họ tên*</label>
								<input type="text" id="name" name="name" value="{{$user->full_name}}" placeholder="Họ tên" required>
							</div>
							<div class="form-block">
								<label>Giới tính </label>
								@if($user->gender==1)
								<input id="gender" type="radio" class="input-radio" name="gender" value="1" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="0" style="width: 10%"><span>Nữ</span>
								@else
								<input id="gender" type="radio" class="input-radio" name="gender" value="1"  style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" checked="checked" value="0" style="width: 10%"><span>Nữ</span>
								@endif
											
							</div>

							<div class="form-block">
								<label for="email">Email*</label>
								<input type="email" id="email" name="email" value="{{$user->email}}" required placeholder="expample@gmail.com">
							</div>

							<div class="form-block">
								<label for="adress">Địa chỉ*</label>
								<input type="text" id="address" name="address" value="{{$user->address}}" placeholder="Street Address" required>
							</div>
							

							<div class="form-block">
								<label for="phone">Điện thoại*</label>
								<input type="text" name="phone" id="phone" value="{{$user->phone}}" required>
							</div>
						@else
							<div class="form-block">
								<label for="name">Họ tên*</label>
								<input type="text" id="name" name="name" placeholder="Họ tên" required>
							</div>
							<div class="form-block">
								<label>Giới tính </label>
								<input id="gender" type="radio" class="input-radio" name="gender" value="1" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="0" style="width: 10%"><span>Nữ</span>
											
							</div>

							<div class="form-block">
								<label for="email">Email*</label>
								<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
							</div>

							<div class="form-block">
								<label for="adress">Địa chỉ*</label>
								<input type="text" id="address" name="address" placeholder="Street Address" required>
							</div>
							

							<div class="form-block">
								<label for="phone">Điện thoại*</label>
								<input type="text" name="phone" id="phone" required>
							</div>
						@endif
						<div class="form-block">
								<label for="notes">Ghi chú</label>
								<textarea id="notes" name="notes"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<!--  one item	 -->
									
									<div class="media">
									
										@if(Session::has('thongbao'))
										<div class="font-large">{{Session::get("thongbao")}}</div>
									@else
									@if(Session::has('cart'))
										@foreach($product_cart as $product)
										<a href="{{route('chitiet',$product['item']['id'])}}">
											<img width="25%" style="padding-right: 10px" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-left"> </a>
											<div class="media-body">
												<p class="font-large">{{$product['item']['name']}}</p>
												<p class="font-large">
													{{$product['qty']}} x
									@if ($product['item']['promotion_price']==0)
										{{$product['item']['unit_price']}}
									@else
									    {{$product['item']['promotion_price']}}											
									@endif
												</p>
											</div>
											<div class="clearfix"></div>
											<div class="space20">&nbsp;</div>
									@endforeach
										
										
										</div>
									<!-- end one item -->
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{number_format(Session('cart')->totalPrice)}} Đồng</h5></div>
									<div class="clearfix"></div>
								</div>
								@endif
								@endif
							</div>
								
									
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button class="btn-danger" type="submit">Đặt Hàng</button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection