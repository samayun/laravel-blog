@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="#" method="post" novalidate="novalidate">
                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="val-username">Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                  <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username.." aria-required="true" aria-describedby="val-username-error" aria-invalid="true">
                                   <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please enter a username</div></div>
                            </div>
                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Your valid email.." aria-required="true" aria-describedby="val-email-error">
                                <div id="val-email-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please enter a valid email address</div></div>
                            </div>
                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Choose a safe one.." aria-required="true" aria-describedby="val-password-error">
                                <div id="val-password-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please provide a password</div></div>
                            </div>
                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="..and confirm it!" aria-required="true" aria-describedby="val-confirm-password-error">
                                <div id="val-confirm-password-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please provide a password</div></div>
                            </div>

                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="val-skill"> Role <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-skill" name="val-skill" aria-required="true" aria-describedby="val-skill-error">
                                        <option value="">Please select</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                <div id="val-skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please select a skill!</div></div>
                            </div>

                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label" for="val-skill"> Active  <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-skill" name="val-skill" aria-required="true" aria-describedby="val-skill-error">
                                        <option value=""> Please select </option>
                                        <option value="1"> Active </option>
                                        <option value="0"> Inactive </option>
                                    </select>
                                <div id="val-skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">Please select a skill!</div></div>
                            </div>

                            <div class="form-group row is-invalid">
                                <label class="col-lg-4 col-form-label"><a href="#">Terms &amp; Conditions</a>  <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                        <input type="checkbox" class="css-control-input" id="val-terms" name="val-terms" value="1" aria-required="true" aria-describedby="val-terms-error"> <span class="css-control-indicator"></span> I agree to the terms</label>
                                <div id="val-terms-error" class="invalid-feedback animated fadeInDown" style="display: block;">You must agree to the service terms!</div></div>
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

