@extends ("NQT.index")
@section('noidung')
<div class="inner-header">
<div class="container">
		<div id="content">
			@if(Session::has("thongbao"))
				<div class="alert alert-success">
				{{Session::get("thongbao")}}
				</div>
			@else
			<form action="{{route('signup')}}" method="post" class="beta-form-checkout">
				{{csrf_field()}}
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Mời nhập thông tin người dùng</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" id="email" placeholder="Email@gmail.com">
							@if($errors->has('email'))
							<label for="email">{{$errors->first('email')}}</label>
							@endif
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" name="fullname" id="your_last_name" placeholder="Nguyễn Văn A" >
							@if($errors->has('fullname'))
							<label for="fullname">{{$errors->first('fullname')}}</label>
							@endif
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address" id="adress" placeholder="tp.Hồ Chí Minh" required>
							@if($errors->has('address'))
							<label for="address">{{$errors->first('address')}}</label>
							@endif
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" id="phone" required >
							@if($errors->has('phone'))
							<label for="phone">{{$errors->first('phone')}}</label>
							@endif
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" id="phone" placeholder="Độ dài từ 6-20 kí tự">
							@if($errors->has('password'))
							<label for="password">{{$errors->first('password')}}</label>
							@endif
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" name="re_password" id="phone" placeholder="Nhập lại password">
							@if($errors->has('re_password'))
							<label for="re_password">{{$errors->first('re_password')}}</label>
							@endif
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
			@endif
		</div> <!-- #content -->
	</div> <!-- .container -->
</div>
@endsection