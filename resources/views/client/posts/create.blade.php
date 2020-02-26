@extends('layouts.frontend.app')

@section('content')
    <div class="container m-5">
        {!! Form::open(['route'=> 'front.posts.store','method'=>'POST','files'=> true ,'class' => ' w-50 mx-auto']) !!}
        {{ Form::token() }}

        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}

        <input type="hidden" name="user_id" value="{{ Auth::id() }}" >

        <div class="form-group">
            {!!  Form::label('title', ' Title') !!}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {!!  Form::text('title', null , ['class' =>'form-control' ]) !!}
        </div>
        <div class="form-group">
            {!!  Form::file('file' , ['class' =>'form-control' ]) !!}
        </div>
        <div class="form-group">
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            {!!  Form::text('content', null , ['class' =>'form-control' ]) !!}
        </div>
        {!!  Form::submit('Create POST ' , ['class' =>'btn btn-warning' ]) !!}
        {!! Form::close() !!}

    </div>
@endsection
