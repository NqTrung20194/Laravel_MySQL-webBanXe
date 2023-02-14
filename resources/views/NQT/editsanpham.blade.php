    @extends ("NQT.admin")

@section('noidung')


        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(Session::has("thongbao"))
                <div class="alert alert-success">
                {{Session::get("thongbao")}}
                </div>
                    @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('editsp',$tt_sp->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Username" value="{{$tt_sp->name}}" />
                                @if($errors->has('name'))
                                    <label for="name">{{$errors->first('name')}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Unit Price</label>
                                <input class="form-control" name="unit_price"  value="{{$tt_sp->unit_price}}" placeholder="Please Enter Password" />
                                @if($errors->has('unit_price'))
                                    <label for="unit_price">{{$errors->first('unit_price')}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Promotion Price</label>
                                <input class="form-control" name="promotion_price" value="{{$tt_sp->promotion_price}}" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" value="{{$tt_sp->image}}" name="image">
                            </div>
                           
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <select name="id_type">
                                 @foreach($phanloai as $pl )
                                 <option name="id_type" value="{{$pl->id}}">{{$pl->name}}</option>
                                @endforeach
                                </select>

                                @if($errors->has('id_type'))
                                    <label for="id_type">{{$errors->first('id_type')}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" name="description"  rows="3">{{$tt_sp->description}}</textarea>
                            </div>

                             <div class="form-group">
                                <label>Trạng thái sản phẩm</label>
                                <label class="radio-inline">
                                    <input name="new" checked="on" type="checkbox">New
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        

@endsection