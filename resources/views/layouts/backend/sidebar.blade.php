   <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/">Analytics</a></li>
                            <li><a href="/"> Trending </a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Admin Activity</li>

                    <li>
                        <a class="has-arrow  @if (Request::is('admin/users/*')) bg-info text-white @endif" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Users</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.users.index') }}" class="bg-info text-white">All User</a></li>
                            <li><a href="{{ route('admin.users.create') }}">Add User</a></li>
                            <li><a href="/">Delete</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow @if (Request::is('admin/posts/*')) bg-info text-white @endif" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Posts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.posts.index') }}"> All Post</a></li>
                            <li><a href="{{ route('admin.posts.create') }}"> Create Post </a></li>
                        </ul>
                    </li>


                    {{--  @if (Route::has('admin/categories/*'))  --}}
                    <li>
                        <a class=" @if (Request::is('admin/categories/*')) bg-info text-white @endif" href="{{ route('admin.categories.index') }}" aria-expanded="false">
                         <span class="nav-text">Category</span>
                        </a>
                    </li>
                    {{--  @endif  --}}
                    <li>
                        <a class=" @if (Request::is('admin/media*')) bg-info text-white @endif" href="{{ route('admin.media.index') }}" aria-expanded="false">
                         <span class="nav-text">Media</span>
                        </a>
                    </li>
                    <li>
                        <a class=" @if (Request::is('admin/comments*')) bg-info text-white @endif" href="{{ route('admin.comments.index') }}" aria-expanded="false">
                         <span class="nav-text" > Comments </span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
