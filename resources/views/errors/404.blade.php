
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
<title> {{ env('APP_NAME')}} - Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="quaxlab/images/favicon.png">

    <link href="{{ asset('css/quaxlab.min.css') }}" rel="stylesheet">

</head>

<body>

<div class="container-fluid mt-3">
<div class="error-content">
    <div class="card mb-0">
        <div class="card-body text-center pt-5">
            <h1 class="error-text text-primary">404</h1>
            <h4 class="mt-4"><i class="fa fa-thumbs-down text-danger"></i> Bad Request</h4>
            <p>Your Request resulted in an error.</p>
            <form class="mt-5 mb-5">

                <div class="text-center mb-4 mt-4"><a href="/" class="btn btn-primary">Go to Homepage</a>
                </div>
            </form>
            <div class="text-center">
                <p>Copyright © Designed by
                     <a href="https://github.com/samayun">Samayun Chowdhury </a> 2020 </p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="javascript:void()" class="btn btn-facebook"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="javascript:void()" class="btn btn-twitter"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="javascript:void()" class="btn btn-linkedin"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="javascript:void()" class="btn btn-google-plus"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>
</body>
</html>
