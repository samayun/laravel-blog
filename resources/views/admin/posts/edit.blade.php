@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-4">
            @if($post->photo)
                <img src="{{ $post->photo->file }}" class="img-responsive w-100  mt-5" alt="{{$post->photo->file}}">
            @else
                <img src="/images/default.png" class=" img-responsive w-100 mt-5"  alt="{{$post->name }}">
            @endif
        </div>
        <div class="col-md-8">
            <h3>Edit post</h3>
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('admin.posts.update', $post) }}" method="POST"  novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            @include('layouts.backend.form_error')
                                <div class="form-group row is-invalid">
                                    <label class="col-lg-4 col-form-label" for="name"> Title  <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                      <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="Enter a title.." aria-required="true" aria-describedby="name-error" aria-invalid="true">
                                       <div id="title-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please enter a title</div>
                                    </div>
                                </div>
                                <div class="form-group row is-invalid">
                                    <label class="col-lg-4 col-form-label" for="name"> Body  <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                       <textarea name="body" class="note-codable">{{ $post->body }}</textarea>
                                       <div id="title-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please enter a title</div>
                                    </div>
                                </div>
                                <div class="form-group row is-invalid">
                                    <label class="col-lg-4 col-form-label" for="file">Photo <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="file"
                                        name="photo_id">
                                    <div id="file-error" class="invalid-feedback animated fadeInDown"
                                    style="display: block;">Please enter a valid image </div></div>
                                </div>
                                <div class="form-group row is-invalid">
                                    <label class="col-lg-4 col-form-label" for="category_id"> Category <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="category_id" name="category_id" aria-required="true" aria-describedby="skill-error">
                                            <option >Please select</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : null }}  >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    <div id="category_id-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please select a category!</div></div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <from action={{ route('admin.posts.destroy' , $post ) }} method="post"
                             class="col-lg-8 ml-auto" >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" > Deleet </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <script src="{{ asset('quaxlab/plugins/validation/jquery.validate.min.js') }} "></script>
    <script src="{{ asset('quaxlab/plugins/validation/jquery.validate-init.js') }}"></script>
@endpush

