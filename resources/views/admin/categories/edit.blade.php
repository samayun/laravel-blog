@extends('layouts.backend.app')

@section('content')
   <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">All categories</a></li>
            </ol>
        </div>
    </div>
  @if(Session::has('deleted_user'))
     <h3 class=" d-block text-danger"> {{ session('deleted_user') }} </h3>
  @endif


    <div class="container-fluid">

        <div class="row d-flex">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Create Category  </h4>
                        @include('layouts.backend.form_error')
                        <div class="basic-form">
                            <form action="{{ route('admin.categories.update' ,$category) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <input type="text" name="name" value="{{ $category->name }}" class="form-control input-rounded" placeholder="Enter Category Name">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control input-rounded btn btn-success" value="Update Category">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <from method="POST" action={{ route('admin.categories.destroy' , $category) }}  >
                    {{--  onclick="return confirm('Are you sure to delete?');deleteIt( '/admin/categories/{{ $category->id }}' , {{ $category->id }} );"  --}}
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="DELETE" />
                </form>
            </div>
        </div>
        {{--  row  --}}
    </div>


@endsection


@push('scripts')
  <script src="{{ asset('quaxlab/plugins/tables/js/jquery.dataTables.min.js') }} "></script>
  <script src="{{ asset('quaxlab/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }} "></script>
  <script src="{{ asset('quaxlab/plugins/tables/js/datatable-init/datatable-basic.min.js') }} "></script>
@endpush
