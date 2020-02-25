@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                    <form class="form-valide" action="{{ route('admin.users.store') }}" method="POST"  novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('post') --}}
                        @include('layouts.backend.form_error')
                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter a name.." aria-required="true" aria-describedby="name-error" aria-invalid="true">
                                   <div id="name-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please enter a name</div></div>
                            </div>
                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Your valid email.." aria-required="true" aria-describedby="email-error">
                                <div id="email-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please enter a valid email address</div></div>
                            </div>
                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="file">Photo <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" id="file"
                                    name="photo_id"  aria-required="true"

                                    aria-describedby="email-error">
                                <div id="file-error" class="invalid-feedback animated fadeInDown"
                                style="display: block;">Please enter a valid image </div></div>
                            </div>
                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="password">Password <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Choose a safe one.." aria-required="true" aria-describedby="password-error">
                                <div id="password-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please provide a password</div></div>
                            </div>
                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="confirm-password">Confirm Password <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="..and confirm it!" aria-required="true" aria-describedby="confirm-password-error">
                                <div id="confirm-password-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please provide a password</div></div>
                            </div>

                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="role_id"> Role <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="role_id" name="role_id" aria-required="true" aria-describedby="skill-error">
                                        <option >Please select</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                <div id="role_id-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please select a role!</div></div>
                            </div>

                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="is_active"> Active  <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="is_active" name="is_active" aria-required="true" aria-describedby="skill-error">
                                        <option value=""> Please select </option>
                                        <option value="1" selected> Active </option>
                                        <option value="0"> Inactive </option>
                                    </select>
                                <div id="skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please select a skill!</div></div>
                            </div>

                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label"><a href="#">Terms &amp; Conditions</a>  <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <label class="css-control css-control-primary css-checkbox" for="terms">
                                        <input type="checkbox" class="css-control-input" id="terms" checked name="terms" value="1" aria-required="true" aria-describedby="terms-error"> <span class="css-control-indicator"></span> I agree to the terms</label>
                                <div id="terms-error" class="invalid-feedback animated fadeInDown" style="display: block;">You must agree to the service terms!</div></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
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

