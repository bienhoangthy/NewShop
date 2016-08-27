@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Province
                    <small>List</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.province.getAdd') }}"><button type="button" class="btn btn-outline btn-primary">Add Province</button></a>
                </h1>
            </div>
            @include('admin.error.flash_message')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Province</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach ($provinces as $item)
                        <?php $stt = $stt + 1 ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{ $stt }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm_delete('Are You Sure Delete This Province?')" href="{{ route('admin.province.getDelete',$item['id']) }}"> Delete</a></td>
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