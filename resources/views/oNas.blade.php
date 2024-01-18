<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logoLKRestaurant.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O nás - LK Restaurant</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">
    <script src="{{asset('assets/js/js_oNas.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<div class="oNas"><nav class="navigationBar">
        <a href="#" class="logo">
            <img src="{{asset('assets/images/logoLKRestaurant.png')}}" alt="LK Restaurant">
        </a>
        <input type="checkbox" id="toggler">
        <label for="toggler"><i class="fas fa-bars"></i></label>
        <div class="menuList">
            <ul class="list">
                <li><a href="{{url('/')}}"><i class="fas fa-home"></i> Domov</a></li>
                <li><a href="{{url('menu')}}"><i class="fas fa-utensils"></i> Menu</a></li>
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
    <header class="py-5 bg-image-full" style="background-image: url('{{asset('assets/images/o_Nas.jpg')}}')">
        <div class="text-center my-5">
            <h1 class="text-white fs-3 fw-bolder">O Nás</h1>
        </div>
    </header>

    <section class="py-5">
        <div class="container my-5 whiteColor">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    @if(Auth::user())
                        <h2>Vitajte "{{ Auth::user()->name }}"</h2>
                        <h2>V LK Restaurant</h2>
                    @else
                        <h2>Vitajte</h2>
                        <h2>V LK Restaurant</h2>
                    @endif

                    <p class="lead" style="display: block;">
                        Vitajte v LK Restaurant, mieste, kde sa kulinárske umenie a pohostinnosť spájajú, aby vytvorili nezabudnuteľný zážitok pre našich hostí. S hrdosťou sme sa stali klenotom našej komunity a jedným z najobľúbenejších reštaurácií v okolí. Od našich skromných začiatkov sme rástli a rozvíjali sa s jediným cieľom: priniesť našim návštevníkom to najlepšie z miestnej kuchyne a ponúknuť vám výnimočnú službu. Naša vášeň pre gastronómiu je zjavná v každom jednom jedle, ktoré pripravujeme, a v každom úsmeve našich zamestnancov.
                    </p>
                    <p class="lead" style="display: none;">
                        Pri výbere surovín dbáme na kvalitu a čerstvosť, pretože vieme, že to je základ vytvárania výnimočných jedál. Naši šéfkuchári majú bohaté skúsenosti a tvoria jedinečné kombinácie chutí, ktoré vás zaručene očaria. Naša pestrá ponuka zahŕňa tradičné miestne špeciality, ako aj medzinárodné chute, aby sme uspokojili rôzne gastronomické preferencie našich hostí.
                    </p>
                    <p class="lead" style="display: none;">
                        Naši zamestnanci sú srdcom našej reštaurácie, a ich pozornosť k detailom a ochota vám poskytnúť vynikajúcu obsluhu robia z návštevy LK Restaurant skutočný zážitok. Naše elegantné a priateľské prostredie vám umožní relaxovať a užívať si jedinečnú atmosféru, či už prídete na romantickú večeru, rodinnú oslavu alebo obchodný obed.
                    </p>
                    <p class="lead" style="display: none;">
                        Tešíme sa na to, že vás privítame v LK Restaurant a umožníme vám objaviť svet vynikajúcich chute a pohostinnosti. Vaša spokojnosť je pre nás prioritou, a sme hrdí, že môžeme byť súčasťou vašich nezabudnuteľných gastronomických zážitkov. Ďakujeme, že nás podporujete a že ste s nami!
                    </p>

                    <p>
                        [Klikni na odstavec, ak chceš prejsť na ďalší]
                        [Alebo čakaj 30 sekúnd, kým sa zobrazí ďalší]
                    </p>
                </div>
            </div>

        </div>
    </section>

    <div class="py-5 bg-image-full" style="background-image: url('{{asset('assets/images/interior.jpg')}}')">
        <div style="height: 20rem"></div>
    </div>

    <section class="our-webcoderskull padding-lg">
        <div class="container">
            <div class="row heading heading-icon">
                <h2>Náš tím kuchárov</h2>
            </div>
            <ul class="row">
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="{{asset('assets/images/lukas.jpg')}}" class="img-responsive" alt=""></figure>
                        <h3><a href="#">Lukáš Kamenický</a></h3>
                        <p>Hlavný šéfkuchár</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="{{asset('assets/images/jozef.jpg')}}" class="img-responsive" alt=""></figure>
                        <h3><a href="#">Jozef Sliacky</a></h3>
                        <p>Šéfkuchár</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="{{asset('assets/images/karel.jpeg')}}" class="img-responsive" alt=""></figure>
                        <h3><a href="#">Karel Novotný</a></h3>
                        <p>Kuchár</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="{{asset('assets/images/vlado.jpg')}}" class="img-responsive" alt=""></figure>
                        <h3><a href="#">Vladimir Nazarecký</a></h3>
                        <p>Kuchár</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

</div>
</body>
</html>
