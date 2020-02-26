@extends('layouts.backend.app')

@section('content')
    <div class="row">
        @if(count($comments) > 0)
          <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> All comments </h4>
                    <div class="table-responsive">
                        <table class="table header-border">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Author </th>
                                    <th> E-mail </th>
                                    <th> Body </th>
                                    <th> Created At </th>
                                    <th> Action  </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td> {{ $comment->id }}</td>
                                    <td> {{ $comment->author }}</td>
                                    <td> {{ $comment->email }}</td>
                                    <td> {{ $comment->body }}</td>
                                    <td> {{ $comment->created_at ? $comment->created_at->diffForHumans()  : "unknown" }}</td>
                                    <td >
                                        <a href="{{ route('post.show' , $comment->post->id) }}" class="btn btn-sm btn-default"> View Post </a>
                                        @if($comment->is_active == 1 )
                                        <form action="{{ route('admin.comments.update' , $comment) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="is_active" value="0">
                                            <input type="submit" class="btn btn-danger" value="Un-Approve" />
                                        </form>
                                        @else
                                            <form action="{{ route('admin.comments.update' , $comment) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="is_active" value="1">
                                                <input type="submit" class="btn btn-success" value="Approve" />
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.comments.destroy' , $comment) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="is_active" value="0">
                                            <input type="submit" class="btn btn-danger" value="Delete" />
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
@endsection

@push('scripts')
  <script src="{{ asset('quaxlab/plugins/tables/js/jquery.dataTables.min.js') }} "></script>
  <script src="{{ asset('quaxlab/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }} "></script>
  <script src="{{ asset('quaxlab/plugins/tables/js/datatable-init/datatable-basic.min.js') }} "></script>
@endpush
