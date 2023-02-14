@extends ("NQT.admin")
@section('noidung')
<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(Session::has("thongbao"))
                <div class="alert alert-success">
                {{Session::get("thongbao")}}
                </div>
                    @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('editidtype',$tt_idtype->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control"  name="name" value="{{$tt_idtype->name}}" placeholder="Please Enter Category Name" />
                                @if($errors->has('name'))
                                    <label for="name">{{$errors->first('name')}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" type="text" name="description" rows="3">{{$tt_idtype->description}}</textarea>
                                @if($errors->has('description'))
                                    <label for="description">{{$errors->first('description')}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <div> <img style="width: 100px!important"  src="source/image/product/{{$tt_idtype->image}}" alt=""></div>
                                <input type="file" style="margin-top: 10px!important " name="image">
                                @if($errors->has('image'))
                                    <label for="image">{{$errors->first('image')}}</label>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
@endsection