
@extends ("NQT.admin")
@section('noidung')
 <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(Session::has('thongbao'))
                            <div class="font-large">{{Session::get("thongbao")}}</div>
                        @endif
                        <form action="{{route('adduser')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Full name</label>
                                <input class="form-control" name="fullname" placeholder="Please Enter Full name" />
                                @if($errors->has('fullname'))
                            <label for="fullname">{{$errors->first('fullname')}}</label>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input class="form-control" name="phone" placeholder="Please Enter Your Phone" />
                                @if($errors->has('phone'))
                            <label for="fullname">{{$errors->first('phone')}}</label>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Please Enter Your Address" />
                                @if($errors->has('address'))
                            <label for="fullname">{{$errors->first('address')}}</label>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Please Enter Password" />
                                @if($errors->has('password'))
                            <label for="fullname">{{$errors->first('password')}}</label>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="re_password" placeholder="Please Enter RePassword" />
                                @if($errors->has('re_password'))
                            <label for="fullname">{{$errors->first('re_password')}}</label>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Please Enter Email" />
                                @if($errors->has('email'))
                            <label for="fullname">{{$errors->first('email')}}</label>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="level" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="2" type="radio">Staff
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="3" checked="" type="radio">Member
                                </label>
                            </div> 
                            <button type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        
@endsection