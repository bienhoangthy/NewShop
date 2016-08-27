@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.cate.getAdd') }}"><button type="button" class="btn btn-outline btn-primary">Add Category</button></a>
                </h1>
            </div>
            @include('admin.error.flash_message')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Category Parent</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach ($cates as $item)
                        <?php $stt = $stt + 1 ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{ $stt }}</td>
                            <td>
                                <a href="{{ route('admin.cate.getDetail',$item['id']) }}">{{ $item['name'] }}</a>
                            </td>
                            <td>
                                @if ($item['parent_id'] != 0)
                                    <?php 
                                        $parent = DB::table('categories')->select('name')->where('id',$item['parent_id'])->first();
                                        echo $parent->name;
                                    ?>
                                @else
                                    None
                                @endif
                            </td>
                            @if (Auth::user()->id != 1)
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>Delete</td>
                            @else
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm_delete('Are you sure Delete this Category?')" href="{{ route('admin.cate.getDelete',$item['id']) }}"> Delete</a></td>
                            @endif
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.cate.getEdit',$item['id']) }}">Edit</a></td>
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
