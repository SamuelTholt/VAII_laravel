<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logoLKRestaurant.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recenzie - LK Restaurant</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">
    <script src="{{asset('assets/js/js_recenzie.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<div class ="oNas"><nav class="navigationBar">
        <a href="#" class="logo">
            <img src="{{asset('assets/images/logoLKRestaurant.png')}}" alt="LK Restaurant">
        </a>
        <input type="checkbox" id="toggler">
        <label for="toggler"><i class="fas fa-bars"></i></label>
        <div class="menuList">
            <ul class="list">
                <li><a href="{{url('/')}}"><i class="fas fa-home"></i> Domov</a></li>
                <li><a href="#"><i class="fas fa-utensils"></i> Menu</a></li>
                <li><a href="{{url('fotogaleria')}}"><i class="fas fa-camera"></i> Fotogaléria</a></li>
                <li><a href="{{url('recenzie')}}"><i class="fas fa-star"></i> Recenzie</a></li>
                <li><a href="{{url('kontakt')}}"><i class="fas fa-envelope"></i> Kontakt</a></li>
                <li><a href="{{url('oNas')}}"><i class="fas fa-info-circle"></i> O nás</a></li>
                @if(Auth::user())
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="text" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-right-to-bracket"></i> {{ Auth::user()->name }}
                            <span class="text-sm text-gray-500">
                            @foreach(Auth::user()->role as $role)
                                    [{{ $role->name_of_role }}]
                                @endforeach
                        </span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                                    {{ __('Dashboard') }}
                                </a></li>
                            <li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    {{ __('Profil') }}
                                </a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Odhlásiť sa
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="text" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-right-to-bracket"></i> Login/Register
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{url('login')}}">Prihlásiť sa</a></li>
                            <li><a class="dropdown-item" href="{{url('register')}}">Zaregistrovať sa</a></li>
                        </ul>
                    </div>
                @endif
            </ul>
        </div>
    </nav>
    <header class="py-5 bg-image-full" style="background-image: url('{{asset('assets/images/rating.jpg')}}')">
        <div class="text-center my-5">
            <h1 class="text-black fs-3 fw-bolder">Recenzie</h1>
        </div>
    </header>

    <section class="py-5 text-center">
        <div class="container my-5 whiteColor">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 id="average"></h2>
                    <p class ="lead" id="pocet5"></p>
                    <p class ="lead" id="pocet4"></p>
                    <p class ="lead" id="pocet3"></p>
                    <p class ="lead" id="pocet2"></p>
                    <p class ="lead" id="pocet1"></p>
                </div>
            </div>
        </div>
    </section>


    @if(Auth::user())
        <section class="py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="d-grid mb-2">
                        <a href="{{ url('/recenzie/create') }}" class="text-black">
                            <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase bg-blue-400" type="button">
                                Napísať recenziu
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="py-5">
        <div class="container my-5 whiteColor">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Napísali o nás</h2><br>
                    <div class="reviews-container">
                        @foreach($reviews as $index => $review)
                            <div class="container review-container">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <p>
                                                    <strong>{{$review->user->name}}</strong>
                                                    @for($i = 0; $i < $review->star_rating; $i++)
                                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                    @endfor
                                                </p>
                                                <div class="clearfix"></div>
                                                <p>{{$review->comments}}</p>
                                                <p>{{ $review->created_at->toFormattedDateString() }}</p>
                                                @can('update', $review)
                                                    <a class="float-right btn btn-outline-primary ml-2" href="{{ route('reviews.edit', ['id' => $review->id]) }}"> <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                @endcan
                                                <div>
                                                    @can('delete', $review)
                                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Odstrániť</button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(($index + 1) % 3 === 0)
                                    <div class="clearfix"></div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
</body>
</html>
