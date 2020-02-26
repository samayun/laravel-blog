@extends('layouts.frontend.app')

@section('content')
<div class="container m-5">

        {!! Form::model( $post,['route'=> ['front.posts.update' , $post->id ],'method'=>'PUT' ,'class' => ' w-50 mx-auto']) !!}
        {{ Form::token() }}
        <input type="hidden" name="user_id" value="1" >
        <div class="form-group">
            {!!  Form::label('title', ' Title') !!}
            {!!  Form::text('title', null, ['class' =>'form-control' ]) !!}
        </div>
        <div class="form-group">
            {!!  Form::label('content', ' Body') !!}
            {!!  Form::text('content',null , ['class' =>'form-control' ]) !!}
        </div>
        {!!  Form::submit('Update POST ' , ['class' =>'btn btn-secondary' ]) !!}
        {!! Form::close() !!}
</div>

@endsection
