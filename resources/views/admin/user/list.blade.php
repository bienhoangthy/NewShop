@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.user.getAdd') }}"><button type="button" class="btn btn-outline btn-primary">Add User</button></a>
                </h1>
            </div>
            @include('admin.error.flash_message')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Level</th>
                        <th>Email</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach ($users as $item)
                        <?php $stt = $stt + 1 ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{ $stt }}</td>
                            <td>
                                <a href="{{ route('admin.user.getDetail', $item['id']) }}">{{ $item['name'] }}</a>
                            </td>
                            <td>{{ $item['fullname'] }}</td>
                            <td>
                                @if ($item['id'] == 1)
                                    <span style="color: red;">Superadmin</span>
                                @elseif ($item['role'] == 1)
                                    <span style="color: blue;">Admin</span>
                                @else
                                    Member
                                @endif
                            </td>
                            <td>{{ $item['email'] }}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm_delete('Are You Sure Delete This User?')" href="{{ route('admin.user.getDelete',$item['id']) }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.user.getEdit',$item['id']) }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()