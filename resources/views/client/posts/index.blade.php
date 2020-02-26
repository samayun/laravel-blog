
@extends('layouts.frontend.app')

@section('content')

<section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading"> Exclusive Offer For You </span>
             <h2 class="mb-2"> ALL POSTS <div class="right">
                <h3 class="text-danger"> <a href="{{ route('post.create') }}">
                    Create Post</a>
                 </h3>
                </div>
            </h2>
      </div>
    </div>
    @if( count($posts) > 0)
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4">
            <div class="property-wrap ftco-animate">

                <div class="img d-flex align-items-center justify-content-center"
                 style="background-image: url('{{ asset($post->photo ? $post->photo->file : "images/default.png") }}');">
                    <a href="{{ route('post.show' , $post->id) }}""
                     class="icon d-flex align-items-center justify-content-center btn-custom">
                        <span class="ion-ios-link"></span>
                    </a>
                    <div class="list-agent d-flex align-items-center">
                        <a href="" class="agent-info d-flex align-items-center">
                            <div class="img-2 rounded-circle"
                             style="background-image: url({{ asset($post->user->photo ? $post->user->photo->file : "images/default.png" )}} );"></div>
                        <h3 class="mb-0 ml-2"> {{ $post->user->name }}</h3>
                        </a>
                        <div class="tooltip-wrap d-flex">
                            <a href="#" class="icon-2 d-flex align-items-center justify-content-center"
                             data-toggle="tooltip" data-placement="top" title="Bookmark">
                                <span class="ion-ios-heart"><i class="sr-only">Bookmark</i></span>
                            </a>
                            <a href="" class="icon-2 d-flex align-items-center justify-content-center"
                             data-toggle="tooltip" data-placement="top" title="Compare">
                                <span class="ion-ios-eye"><i class="sr-only">Compare</i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text">
                    {{-- <p class="price mb-3"><span class="old-price">800,000</span><span class="orig-price">$3,050<small>/mo</small></span></p> --}}
                    <h3 class="mb-0">
                        <a href="{{ route('post.show' , $post->id) }}"> {{ $post->title }} </a>
                    </h3>
                    <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i> {{ $post->body }} </span>
                    {{-- <ul class="property_list">
                        <li><span class="flaticon-bed"></span>3</li>
                        <li><span class="flaticon-bathtub"></span>2</li>
                        <li><span class="flaticon-floor-plan"></span>1,878 sqft</li>
                    </ul> --}}
                 </div>


            </div>

        </div>
        @endforeach

    </div>
   @else
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <h2 class="mb-2"> NO POSTS</h2>
        </div>
   @endif

    </div>
</section>


@endsection
