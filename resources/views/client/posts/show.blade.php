@extends('layouts.frontend.app')

@section('content')

<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ftco-animate fadeInUp ftco-animated">
          <h2 class="mb-3"> {{ $post->title }} </h2>
            <img src="{{ asset($post->photo ? $post->photo->file : "images/default.png") }}" alt="" class="img-fluid w-50">
          </p>
          <p> {{ $post->body }} <p>

          <div class="tag-widget post-tag-container mb-5 mt-5">
            <div class="tagcloud">
              <a href="" class="tag-cloud-link">Life</a>
              <a href="" class="tag-cloud-link">Sport</a>
            </div>
          </div>

          <div class="about-author d-flex p-4 bg-light">
            <div class="bio mr-5">
              <img src="{{ asset( $post->user->photo ? $post->user->photo->file : "images/default.png") }}" alt="Image placeholder" class="img-fluid mb-4 w-50">
            </div>
            <div class="desc">
              <h3> {{ $post->user->name }} </h3>
              <p> I live in Bangladesh  </p>
            </div>
          </div>


          @if(Auth::check())
          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            @if(Session::has('comment_message'))
                <h3 class=" d-block text-danger"> {{ session('comment_message') }} </h3>
            @endif

            <form action="{{ route('post.store') }}" method="POST" class="p-5 bg-light">
                @csrf

              <div class="form-group">
                  <input type="hidden" name="post_id" value="{{ $post->id }}">
                <label for="message"> Body </label>
                <textarea name="body" id="message" cols="15" rows="8" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
              </div>
            </form>
          </div>
          @endif

          <div class="pt-5 mt-5">
            <h3 class="mb-5"> {{ $post->comments->count() }} Comments</h3>

            <ul class="comment-list">

            @foreach($post->comments as $comment)
              <li class="comment">
                <div class="vcard bio">
                  <img src="{{ asset( $post->user->photo ? $post->user->photo->file : "images/default.png") }}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>{{ $comment->author}}  </h3>
                  <div class="meta"> {{ $comment->created_at->diffForHumans() }} </div>
                  {{--  <div class="meta">October 17, 2019 at 2:21pm</div>  --}}
                  <p>{{ $comment->body }}<p>
                      <a href="" class="reply">Reply</a></p>
                      {{ $comment->user }}
                </div>
              </li>
              @endforeach

              {{--  <li class="comment">
                <div class="vcard bio">
                  <img src="/frontend/images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>John Doe</h3>
                  <div class="meta">October 17, 2019 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div>

                <ul class="children">
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="/frontend/images/person_1.jpg" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>John Doe</h3>
                      <div class="meta">October 17, 2019 at 2:21pm</div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                      <p><a href="#" class="reply">Reply</a></p>
                    </div>


                    <ul class="children">
                      <li class="comment">
                        <div class="vcard bio">
                          <img src="/frontend/images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                          <h3>John Doe</h3>
                          <div class="meta">October 17, 2019 at 2:21pm</div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                          <p><a href="#" class="reply">Reply</a></p>
                        </div>

                          <ul class="children">
                            <li class="comment">
                              <div class="vcard bio">
                                <img src="/frontend/images/person_1.jpg" alt="Image placeholder">
                              </div>
                              <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">October 17, 2019 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                              </div>
                            </li>
                          </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>  --}}


            </ul>
            <!-- END comment-list -->


          </div>

        </div> <!-- .col-md-8 -->
        <div class="col-md-4 pl-md-5 sidebar ftco-animate fadeInUp ftco-animated">
          <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div>
          <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
            <div class="categories">
              <h3>Categories</h3>

              <li><a href="">Home <span>(12)</span></a></li>

            </div>
          </div>

         ecent Blog shyuld be includedR

          <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
            <h3>Tag Cloud</h3>
            <div class="tagcloud">
              <a href="" class="tag-cloud-link">dish</a>
            </div>
          </div>

          <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
            <h3>Paragraph</h3>
            <p> If need keep it  </p>
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
