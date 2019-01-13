<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <script src="{{ asset('js/app.js') }}" defer></script>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


        @media screen and (min-width: 1472px) {

            .container {
                max-width: 1344px;
                width: 45%;
            }

        }

        @media screen and (min-width: 1472px) {
            .container {
                max-width: 1344px;
                width: 45%;
            }
        }


        @media screen and (min-width: 1280px) {
            .container {
                max-width: 1152px;
                width: 45%;
            }
        }

        @media screen and (min-width: 1088px) {
            .container {
                max-width: 960px;
                width: 45%;
            }
        }


        @media (min-width: 992px) {
            .container {
                max-width: 65%;
            }
        }


        .todoBy {
            text-align: center;
            padding-bottom: 10px;
        }



        .box-edited {
            width: 100%;
        }

        .icons-edit {
            width: 100%;
        }

        .completed{
            text-decoration: line-through;
        }

        #defaultLink{
            cursor: auto;
        }

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    @if (Auth::guest())
    <div class="flex-center position-ref full-height">
        @else
        <div class="flex-center position-ref">
            @endif @if (Route::has('login'))
            <div class="top-right links">
                @auth {{--
                <a href="{{ url('/home') }}">Home</a> --}} @else {{--
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif --}} @endauth
            </div>
            @endif

            <div class="content">

                @auth
                <div class="title m-b-md">
                    Add Todos here
                </div>

                <form action="store" method="post">

                    @csrf

                    <div class="field">
                        <label class="label">Todo Name</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Todo Name" name="todoName" value="{{old(" todoName ")}}">
                        </div>
                    </div>


                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button class="button is-link">Submit</button>
                        </div>
                    </div>

                </form>


                @if ($errors->any())
                <!-- <ul>   -->
                <br> @foreach($errors->all() as $error)
                <!-- <li>    -->


                <div class="notification is-danger">
                    <!-- <button class="delete"></button> -->
                    {{$error}}
                </div>


                <!-- </li> -->


                @endforeach
                <!-- </ul> -->
                @endif

                <br>




                <!-- <div class="field is-grouped is-grouped-centered">
                    <p class="control">
                        <button class="button is-link">Submit</button>
                    </p>
                    <p class="control">
                      <a class="button is-light">
                        Cancel
                      </a>
                    </p>
                  </div> -->

                {{--
                <div class="links">
                    <a href="https://laravel.com/docs">Get Started</a>
                    {{--
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> --}}
                </div>

                @else

                <div class="title m-b-md">
                    Todo List
                </div>

                <div class="links">
                    <a id="defaultLink">Get Started</a>
                    {{--
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> --}}
                </div>

                <div>
                    <p> </p>
                </div>
                <div class="links">
                    <a href="login">Login</a>
                    <a href="register">Register</a>
                    {{--
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> --}}
                </div>


                @endauth



            </div>


            @if (Auth::user())
            <div class="container">
                <div class="notification">




                    <!-- <ul> -->
                    @foreach ($users as $user)

                    <p class="todoBy"> 
                        <strong>
                            <!-- {{$user->name}} -->
                            Your todos
                        </strong>
                    </p>

                    <!-- <li> {{$user->name}} </li>     -->

                    @foreach ($user->todo as $todo)


                    <div class="box">
                        <article class="media">





                            <div class="box box-edited">
                                <article class="media">

                                    <div class="media-content">
                                        <div class="content">

                                            @if($todo->completed === 1)
                                            <p class="completed">
                                                @else($todo->completed === 0)
                                                <p>
                                                    @endif

                                                {{$todo->todoName}}
                                            </p>
                                        </div>

                                        <form action="complete/{{$todo->id}}" method="post">

                                            @csrf
                                            @method("PATCH")
                                        
                                        </form>

                                        <nav class="level is-mobile">
                                            <div class="level-left icons-edit">
                                                <a href="javascript:{}" onclick="document.querySelector('[action=\'complete/{{$todo->id}}\']').submit();" class="level-item" aria-label="reply">

                                                    <i class="tiny material-icons">check_box</i>
                                                </a>


                                                <!-- <form id="todoUpdate" action="update/{{$todo->id}}" method="post">
                                                @csrf
                                                </form> -->


                                                <a  href="update/{{$todo->id}}" class="level-item" aria-label="retweet">
                                                    <i class="tiny material-icons">edit</i>
                                                </a>


                                                <form id="todoDelete" action="delete/{{$todo->id}}" method="post">
                                                @csrf
                                                @method("DELETE")

                                                
                                                </form>

                                                <a alt="Delete"  href="javascript:{}" onclick="document.querySelector('[action=\'delete/{{$todo->id}}\']').submit();" class="level-item" aria-label="like">
                                                    <i class="tiny material-icons">delete</i>
                                                </a>


                                                
                                            </div>
                                        </nav>
                                    </div>
                                </article>
                            </div>






                        </article>
                    </div>








                    @endforeach @endforeach
                    <!-- <ul> -->

                </div>
            </div>
            @endif


        </div>





</body>

</html>