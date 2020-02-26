@extends('layouts.backend.app')

@section('content')
   <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">All posts</a></li>
            </ol>
        </div>
    </div>
  @if(Session::has('deleted_user'))
     <h3 class=" d-block text-danger"> {{ session('deleted_user') }} </h3>
  @endif

@if(count($posts) > 0)
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Application posts</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Owner</th>
                                        <th>Category</th>
                                        {{--  <th>Photo </th>  --}}
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Created AT</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td> {{ $post->id}}</td>
                                        <td> {{ $post->user->name}}</td>
                                        <td> {{ $post->category ? $post->category->name : "Uncategorized" }} </td>
                                        {{--  <td>
                                            @if($post->photo)
                                               <img src="{{ $post->photo->file }}" height="70px" class=" img-responsive w-25" alt="{{$post->photo->file}}">
                                             @else
                                                <img src="/images/default.png" height="70px" class=" img-responsive w-25"  alt="{{$post->name }}">
                                             @endif
                                        </td>  --}}
                                        <td> {{ $post->title}}</td>
                                        <td> {{ substr($post->body , 0,50) }}</td>
                                        {{--  <td> <span class="badge badge-pill badge-{{ $post->role && $post->role->name == 'administrator' ? 'primary' : 'danger' }}">{{ $post->role->name }}</span> </td>  --}}
                                        {{--  <td>
                                             <span class="badge badge-pill badge-{{ $post->is_active == 1 ? 'light' : 'danger' }}">
                                                {{ $post->is_active == '1' ? 'Active' : 'Unactive' }}
                                            </span>
                                        </td>  --}}
                                        <td> {{ $post->created_at ? $post->created_at->diffForHumans()  : "unknown" }}</td>
                                        <td >
                                            <a href="{{ route('admin.posts.edit' , $post->id) }}" class="btn btn-sm btn-info"> Update </a>
                                            <a href="{{ route('post.show' , $post->id) }}" class=""> VIew Post </a>
                                            <a href="{{ route('admin.comments.show' , $post->id) }}" class=""> View  Comment </a>

                                        </td>
                                    </tr>
                                   @endforeach

                                </tbody>
                                {{--  <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>  --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endif

@endsection


@push('scripts')
<script src="{{ asset('quaxlab/js/dashboard/dashboard-1.js') }} "></script>

<script src="{{ asset('quaxlab/plugins/tables/js/jquery.dataTables.min.js') }} "></script>
<script src="{{ asset('quaxlab/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }} "></script>
<script src="{{ asset('quaxlab/plugins/tables/js/datatable-init/datatable-basic.min.js') }} "></script>

@endpush
