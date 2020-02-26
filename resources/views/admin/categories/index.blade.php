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
                            <form action="{{ route('admin.categories.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control input-rounded" placeholder="Enter Category Name">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control input-rounded btn btn-info" value="Create Category">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($categories) > 0)
              <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> All Categories </h4>
                        <div class="table-responsive">
                            <table class="table header-border">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created AT</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td> {{ $category->id}}</td>
                                        <td> {{ $category->name}}</td>
                                        <td> {{ $category->created_at ? $category->created_at->diffForHumans()  : "unknown" }}</td>
                                        <td >
                                            <a href="{{ route('admin.categories.edit' , $category->id) }}" class="btn btn-sm btn-info"> UPDATE </a>
                                            <from action={{ route('admin.categories.destroy' , $category->id ) }} action="POST"
                                                onclick="return confirm('Are you sure to delete?');deleteIt( '/admin/categories/{{ $category->id }}' , {{ $category }} );">
                                                @csrf
                                                @method('DELETE')
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
            {{--  col   --}}
            @endif

        </div>
        {{--  row  --}}
    </div>


@endsection


@push('scripts')
  <script src="{{ asset('quaxlab/plugins/tables/js/jquery.dataTables.min.js') }} "></script>
  <script src="{{ asset('quaxlab/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }} "></script>
  <script src="{{ asset('quaxlab/plugins/tables/js/datatable-init/datatable-basic.min.js') }} "></script>
  <script>
    function createNewProfile(profile) {


        return fetch('http://example.com/api/v1/registration', {
            method: 'POST',
            body: formData
        }).then(response => response.json())
    }

      function deleteIt (url , category) {
            const formData = new FormData();
            formData.append('id', category.id);
            formData.append('name', category.name);

        fetch(url ,{
            method : "DELETE",
            body : formData
            }
        )
        .then(r => {
            window.location.reload();
            console.log(r)
        }).catch(console.log)
      }
  </script>
@endpush
