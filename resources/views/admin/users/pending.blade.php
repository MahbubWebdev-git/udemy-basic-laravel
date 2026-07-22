@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Pending User Registration Requests</h4>
                        
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Registered At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @stringForeach($users as $key => $user)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>
                                            <!-- এক ক্লিকে অ্যাপ্রুভ করার ফর্ম ও বাটন -->
                                            <form action="{{ route('admin.user.approve', $user->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm waves-effect waves-light">
                                                    <i class="fas fa-check"></i> Approve Account
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endstringForeach
                                    @if($users->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No pending registration requests found.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
