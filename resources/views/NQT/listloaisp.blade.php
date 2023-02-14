
@extends ("NQT.admin")
@section('noidung')

 <!-- Page Content -->
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Mô Tả</th>
                                <th>Hình</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $l)
                            <tr class="odd gradeX "  align="left">
                                <td>{{$l->id}}</td>
                                <td>{{$l->name}}</td>
                                <td >{{$l->description}}</td>
                                <td>
                                    <a href="{{route('chitiet',$l->id)}}" style="margin: auto!important"><img style="width: 100px!important"  src="source/image/product/{{$l->image}}" alt=""></a>
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('dellistloaisp',$l->id)}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editidtype',$l->id)}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
@endsection