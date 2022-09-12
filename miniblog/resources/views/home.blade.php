<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
                background: #f7fafc;
            }

        </style>
    </head>

    <body>
        <div class="container-fluid fixed-top p-4">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-muted">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                                    @endif
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <header class="d-flex py-3 bg-white shadow-sm border-bottom">
                    <div class="container-fluid">
                        <h2 class="h4 font-weight-bold">
                            MINI BLOG
                        </h2>
                    </div>
                </header>
            </div>

            <div class="row mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-hover bordered caption-top align-middle"
                                        style="text-align: center; table-layout:fixed;">
                                        <caption>All Post</caption>
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Title</th>
                                                <th>Post</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($posts[0]))
                                                @foreach ($posts as $post)
                                                    <tr>
                                                        <th>{{ $post->user->name }}</th>
                                                        <td>{{ $post->title }}</td>
                                                        <td>{{ $post->body }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4">You don't have any Post!</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
