<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description', 'Site description')">
    <meta name="author" content="Shawn Sandy">
    <!-- Latest compiled and minified CSS -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://unpkg.com/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        html, body {
            -webkit-font-smoothing: antialiased;
        }

        section {
            margin-bottom: 60px;
        }

        p {
            font-size: 16px;
        }

        .gist-meta p {
            color: gray;
        }

        .CodeMirror {
            border: 1px solid gray;
            font-size: 13px
        }

        .git-editor, .gist-editor {
            padding: 10px;
            background-color: lightgray;
            margin: 20px 0;
        }

        .paginate {
            padding: 20px 0 20px;
        }

        .form-control {
            border-radius: 0;
        }

        .hide {
            display: none;
        }

        .btn {
            border-radius: 20px;
        }

        footer {
            padding: 50px 0;
        }
    </style>
    @stack('styles')
    @stack('inline-styles')
</head>

<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>
                    <a href="/deploy">@yield('page_title')</a>
                </h1>

            </div>
            <div class="col-md-6 text-right">
                <p class="h1">
                    <a href="/" class="btn btn-link btn-lg"><i class="fa fa-home"></i></a>
                </p>
            </div>
        </div>

    </div>
    <hr>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('deploys::partials.messages')
        </div>
    </div>
</div>
@yield('content')
<footer>
    <p class="text-center">Footer </p>
</footer>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
@stack('scripts')
@stack('inline_scripts')
</html>
