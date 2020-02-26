@extends('layouts.backend.app')

@section('content')
   <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">All Comment</a></li>
            </ol>
        </div>
    </div>
  @if(Session::has('deleted_user'))
     <h3 class=" d-block text-danger"> {{ session('deleted_user') }} </h3>
  @endif
</div>


@endsection


@push('scripts')
  <script src="{{ asset('quaxlab/plugins/tables/js/jquery.dataTables.min.js') }} "></script>
  <script src="{{ asset('quaxlab/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }} "></script>
  <script src="{{ asset('quaxlab/plugins/tables/js/datatable-init/datatable-basic.min.js') }} "></script>
@endpush
