@extends ("NQT.admin")
@section('noidung')

            <div class="container-fluid col-sm-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="beta-products-details col-lg-12">
                                <p class="pull-left">Tìm thấy {{count($products)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example col-lg-12">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>TÊN</th>
                                <th>Mô Tả</th>
                                <th>Giá</th>
                                <th>Giá khuyến mãi</th>
                                <th>Hình</th>
                                <th>Đơn Vị</th>
                                <th>New</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $pr)
                            <tr class="odd gradeX" align="center" >
                                <td>{{$pr->id}}</td>
                                <td>{{$pr->name}}</td>
                                <td >{{$pr->description}}</td>
                                <td>{{$pr->unit_price}}</td>
                                <td>{{$pr->promotion_price}}</td>
                                <td align="center">
                                   <a href="{{route('chitiet',$pr->id)}}" style="margin: auto!important"><img style="width: 100px!important"  src="source/image/product/{{$pr->image}}" alt=""></a>
                                </td>
                                <td>{{$pr->unit}}</td>
                                <td>{{$pr->new}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('delsp',$pr->id)}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editsp',$pr->id)}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">{{$products->links('pagination::bootstrap-4')}}</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        

@endsection