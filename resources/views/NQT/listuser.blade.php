@extends ("NQT.admin")
@section('noidung')
<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Cấp Bậc</th>
                                <th>SDT</th>
                                <th>Địa Chỉ</th>
                                <th>Email</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        	
                        	@foreach($listuser as $ls)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ls->id}}</td>
                                <td>{{$ls->full_name}}</td>
                                    @switch($ls->level)
                                        @case(1)
                                            <td>Admin</td>
                                            @break

                                        @case(2)
                                            <td>Nhân Viên</td>
                                            @break

                                        @default
                                            <td>Người dùng</td>
                                    @endswitch
                                <td>{{$ls->phone}}</td>
                                <td>{{$ls->address}}</td>
                                <td>{{$ls->email}}</td>
                                <td class="center"><a href="{{route('deluser',$ls->id)}}"> <i class="fa fa-trash-o  fa-fw"></i></a></td>
                                <td class="center"> <a href="{{route('edituser',$ls->id)}}"><i class="fa fa-pencil fa-fw"></i></a></td>
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
        
@endsection