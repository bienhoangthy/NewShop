@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comments
                    <small>List</small>
                </h1>
            </div>
            @include('admin.error.flash_message')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Handling</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach ($comments as $item)
                        <?php $stt = $stt + 1 ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{ $stt }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['message'] }}</td>
                            <td>@if ($item['view'] == 0)
                                <i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm_delete('Are You Sure Delete This Comment?')" href="{{ route('admin.comment.getDelete',$item['id']) }}"> Delete</a>
                            @else
                                <a  href="{{ route('admin.comment.getSee',$item['id']) }}"> See</a>
                            @endif</td>
                            <td>{{ $item['created_at'] }}</td>
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