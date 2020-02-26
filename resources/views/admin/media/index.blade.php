@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">  --}}
@endpush
@section('content')
   <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">All photos</a></li>
            </ol>
        </div>
    </div>
  @if(Session::has('deleted_user'))
     <h3 class=" d-block text-danger"> {{ session('deleted_user') }} </h3>
  @endif


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Upload image  </h4>
                        @include('layouts.backend.form_error')
                        <div class="basic-form">
                            <form action="{{ route('admin.media.store') }}" method="POST" class="dropzone" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" name="file[]" class="form-control input-rounded" multiple="true">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control input-rounded btn btn-info" value="Upload Image">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($photos) > 0)
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Application photos</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Photo </th>
                                        <th>Created AT</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($photos as $photo)
                                    <tr>
                                        <td> {{ $photo->id}}</td>
                                        <td> <img src="{{ $photo->file }}"  style="width:80px;height:60px;"> </td>
                                        <td> {{ $photo->created_at ? $photo->created_at->diffForHumans()  : "unknown" }}</td>
                                        <td>
                                            <from
                                                action={{ route('admin.media.destroy' , $photo->id ) }}
                                                method="POST" >
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="DELETE" />
                                            </form>
                                        </td>
                                    </tr>
                                   @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>


@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>  --}}

    <script src="{{ asset('quaxlab/js/dashboard/dashboard-1.js') }} "></script>
    <script src="{{ asset('quaxlab/plugins/tables/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('quaxlab/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }} "></script>
    <script src="{{ asset('quaxlab/plugins/tables/js/datatable-init/datatable-basic.min.js') }} "></script>

@endpush
