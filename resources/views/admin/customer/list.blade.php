@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customers
                    <small>List</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.customer.totalGuest') }}"><button type="button" class="btn btn-outline btn-primary">Total Guests</button></a>
                </h1>
            </div>
            @include('admin.error.flash_message')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Province</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>User</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach ($customers as $item)
                        <?php $stt = $stt + 1 ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{ $stt }}</td>
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->province }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->tel }}</td>
                            <td>{{ $item->email }}</td>
                            
                            <td>
                                @if ($item->guest == null)
                                    <?php $user = DB::table('users')->where('id',$item->user_id)->first(); ?>
                                    @if (isset($user))
                                        {{ $user->name }}
                                    @endif
                                @else
                                    Guest
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm_delete('Are you sure Delete this Customer?')" href="{{ route('admin.customer.getDelete',$item->id) }}"> Delete</a></td>
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
