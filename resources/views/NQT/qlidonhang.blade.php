@extends ("NQT.admin")
@section('noidung')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản Lý
                            <small>Đơn Hàng</small>
                        </h1>
                    </div>
                    <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($list)}} đơn hàng</p>
                                <div class="clearfix"></div>
                            </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>TÊN</th>
                                <th>TỔNG TIỀN</th>
                                <th>NGÀY ĐẶT</th>
                                <th>TRẠNG THÁI</th>
                                <th>Delete</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($list as $l)
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$l->id}}</td>
                                <td>{{$l->customer}}</td>
                                <td>{{$l->total}}</td>
                                <td>{{$l->date_order}}</td>
                                <td>
                                	<form action="{{route('eddh',$l->id)}}" method="get">
                                	<select name="status">
                                	@switch($l->status)
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
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('deldh',$l->id)}}"> Xóa đơn hàng</a></td>
                                <td class="center"> <button type="submit" class="btn btn-default"><i class="fa fa-pencil fa-fw"></i>Update</button></td>
                                </form>
                                
                            </tr>
                            @endforeach
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