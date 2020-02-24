@extends('layouts.backend.app')

@section('content')

        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">All Users</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
@if(count($users) > 0)
    <div class="container-fluid">
    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Application Users</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Badge</th>
                                        <th>Active</th>
                                        <th>Created AT</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td> {{ $user->id}}</td>
                                        <td> {{ $user->name}}</td>
                                        <td> {{ $user->email}}</td>
                                        <td> <span class="badge badge-pill badge-{{ $user->role->name == 'administrator' ? 'primary' : 'danger' }}">{{ $user->role->name }}</span> </td>
                                        <td>
                                             <span class="badge badge-pill badge-{{ $user->is_active == 1 ? 'light' : 'danger' }}">
                                                {{ $user->is_active == '1' ? 'Active' : 'Unactive' }}
                                            </span>
                                        </td>
                                        <td> {{ $user->created_at ? $user->created_at->diffForHumans()  : "unknown" }}</td>
                                        <td> {{ $user->updated_at ? $user->updated_at->diffForHumans() : "Not Updated " }}</td>
                                    </tr>
                                   @endforeach

                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endif

@endsection


@push('scripts')
  <script src="{{ asset('quaxlab/plugins/tables/js/jquery.dataTables.min.js') }} "></script>
  <script src="{{ asset('quaxlab/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }} "></script>
  <script src="{{ asset('quaxlab/plugins/tables/js/datatable-init/datatable-basic.min.js') }} "></script>
@endpush