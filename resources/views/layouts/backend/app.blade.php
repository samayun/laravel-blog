@include('layouts.backend.header')

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts.backend.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">
                @yield('content')
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

@include('layouts.backend.footer')



