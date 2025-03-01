@extends('welcome')

@section('content')

<section class="content">

    @if (session('success'))
    <h6 class="alert alert-warning mb-3">{{ session('success') }}</h6>  
    @endif


    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Simple Full Width Table</h3>
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table   id="myTable" class="table table-bordered">
                                <thead  class="thead-dark">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>User</th>
                                        <th>Mail</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{$user->name  }}</td>
                                        <td>{{$user->email }}</td>
                                        <td>
                                            <form action="{{ url('/updaterole/'.$user->id) }}" method="POST">
                                                @csrf
                                                <select name="role" class="form-control" onchange="this.form.submit()">
                                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ url('/editusers',$user->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('/deleteusers',$user->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

!-- Add jQuery (Required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>

@endsection
