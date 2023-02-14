@extends ("NQT.admin")
@section('noidung')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Chi Tiết
                            <small>Đơn Hàng</small>
                        </h1>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>NGÀY ĐẶT</th>
                                <th>Sản Phẩm Đã Mua</th>
                                <th>TỔNG TIỀN</th>
                                <th>TRẠNG THÁI</th>
                                <th>Delete</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>

                            
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$dh->id}}</a></td>
                                <td>{{$name->name}}</td>
                                <td>{{$dh->date_order}}</td>
                                <td> @foreach($ct as $ct)
                                    <tr>
                                        {{$ct->name}}
                                    </tr>
                                    @endforeach
                                </td>
                                <td>{{$dh->total}}</td>
                                <td>
                                    <form action="{{route('eddh',$dh->id)}}" method="get">
                                    <select name="status">
                                    @switch($dh->status)
                                        @case(0)
                                            <option selected value="0">Đang xử lý</option>
                                            <option value="1">Đã hoàn thành</option>
                                            @break

                                        @default
                                            <option value="0" >Đang xử lý</option>
                                            <option selected value="1">Đã hoàn thành</option>
                                    @endswitch
                                    </select>
                                    
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('deldh',$dh->id)}}"> Xóa đơn hàng</a></td>
                                <td class="center"> <button type="submit" class="btn btn-default"><i class="fa fa-pencil fa-fw"></i>Update</button></td>
                                </form>
                                
                            </tr>
                           
                        </tbody>
                    </table>
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>

@endsection