@extends ("NQT.admin")
@section('noidung')
<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(Session::has('thongbao'))
                            <div class="font-large">{{Session::get("thongbao")}}</div>
                        @endif
                        <form action="{{route('edituser',$tt_user->id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Full name</label>
                                <input class="form-control" name="fullname" value="{{$tt_user->full_name}}" placeholder="Please Enter Full name"  />
                                @if($errors->has('fullname'))
                            <label for="fullname">{{$errors->first('fullname')}}</label>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input class="form-control" name="phone" value="{{$tt_user->phone}}" placeholder="Please Enter Your Phone" />
                                @if($errors->has('phone'))
                            <label for="phone">{{$errors->first('phone')}}</label>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" value="{{$tt_user->address}}" placeholder="Please Enter Your Address" />
                                @if($errors->has('address'))
                            <label for="address">{{$errors->first('address')}}</label>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{$tt_user->email}}" name="email" placeholder="Please Enter Email" />
                                @if($errors->has('email'))
                            <label for="email">{{$errors->first('email')}}</label>
                            @endif
                            </div>
                        <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="level" value="1"  type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="2" type="radio">Staff
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="3" type="radio">Member
                                </label>
                                @if($errors->has('level'))
                            <label for="email">{{$errors->first('level')}}</label>
                            @endif
                        </div> 
                            <button type="submit" class="btn btn-default">User Update</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection