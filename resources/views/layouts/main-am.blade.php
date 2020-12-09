<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>

    <title>Domestic violence</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css"
    />

    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}"/>
</head>

<body>

<header>
    <div class="site-settings position-fixed bg-light">
        <div
            class="container-fluid custom-container d-flex justify-content-end h-100 align-items-center"
        >
            <span class="icon-zoom-in"></span>
            <span class="icon-zoom-out ml-3"></span>
            <span class="icon-invert-colors ml-3"></span>
        </div>
    </div>
    <nav
        class="navbar fixed-top navbar-dark bg-secondary p-0 align-items-center"
    >
        <div
            class="container-fluid custom-container header-navigation flex-column flex-md-row align-items-start align-items-md-center h-100"
        >
            <ul class="nav-language list-unstyled mb-0 mb-5 pt-4 pl-0 pr-0">
                <li
                    class="nav-language-item text-uppercase active font-weight-bolder mr-2"
                >
                    >ՀԱՅ
                </li>
                <li
                    class="nav-language-item text-uppercase font-weight-bolder"
                >
                    <a
                        class="nav-language-item-link p-0 font-weight-bolder text-decoration-none"
                        href="{{url(($view === 'index') ? ('/en/') : ('/en/' . $view))}}"
                    >ENG</a
                    >
                </li>
            </ul>
            <i class="icon-quit mr-md-2 position-absolute text-light"></i>
            <ul
                class="navbar-nav flex-row flex-column align-items-start align-items-md-center flex-md-row flex-grow-1 d-md-flex"
            >
                <li
                    class="nav-item mr-4 mb-5 mb-md-0 d-inline-block mr-xl-5 {{$view === 'index' ? 'active' : ''}} text-uppercase font-weight-bold"
                >
                    @if($view === 'index')
                        ԱՐՇԱՎԻ ՄԱՍԻՆ
                    @else
                        <a class="nav-link  p-0" href="{{url('/')}}"
                        >ԱՐՇԱՎԻ ՄԱՍԻՆ</a
                        >
                    @endif
                </li>
                <li
                    class="nav-item mr-4 mb-5 mb-md-0 d-inline-block mr-xl-5 {{$view === 'domestic' ? 'active' : ''}} text-uppercase font-weight-bold"
                >
                    @if($view === 'domestic')
                        ԸՆՏԱՆԵԿԱՆ ԲՌՆՈՒԹՅՈՒՆ
                    @else
                        <a class="nav-link  p-0" href="{{url('/domestic')}}"
                        >ԸՆՏԱՆԵԿԱՆ ԲՌՆՈՒԹՅՈՒՆ</a
                        >
                    @endif
                </li>
                <li
                    class="nav-item mr-4 mb-5 mb-md-0 d-inline-block mr-xl-5 {{$view === 'statistics' ? 'active' : ''}} text-uppercase font-weight-bold"
                >
                    @if($view === 'statistics')
                        ՎԻՃԱԿԱԳՐՈՒԹՅՈՒՆ
                    @else
                        <a class="nav-link p-0" href="{{url('/statistics')}}">ՎԻՃԱԿԱԳՐՈՒԹՅՈՒՆ</a>
                    @endif
                </li>
                <li class="nav-item text-uppercase {{$view === 'your-rights' ? 'active' : ''}} font-weight-bold">
                    @if($view === 'your-rights')
                        ԻՄԱՑԻՐ ՔՈ ԻՐԱՎՈՒՆՔՆԵՐԸ
                    @else
                        <a class="nav-link p-0" href="{{url('/your-rights')}}"
                        >ԻՄԱՑԻՐ ՔՈ ԻՐԱՎՈՒՆՔՆԵՐԸ</a
                        >
                    @endif
                </li>
            </ul>
        </div>
        <div
            class="position-absolute header-right-side d-flex align-items-center"
        >
            <div
                class="nav-helpline flex-grow-1 flex-md-grow-0 h-100 d-flex align-items-center bg-light text-secondary"
            >
            <span class="mr-3 h5 mb-0 font-weight-bolder">Թեժ գիծ</span
            ><span class="icon-phone text-primary font-size-30 mr-2"></span>
                <span class="h1 font-weight-bolder font-size-40 mb-0">114</span>
            </div>
            <ul class="nav-language list-unstyled mb-0 d-none d-md-flex">
                <li
                    class="nav-language-item active text-uppercase font-weight-bolder mr-2"
                >
                        ՀԱՅ
                </li>
                <li
                    class="nav-language-item text-uppercase font-weight-bolder"
                >
                        <a
                            class="nav-language-item-link p-0 font-weight-bolder text-decoration-none"
                            href="{{url(($view === 'index') ? ('/en/') : ('/en/' . $view))}}"
                        >ENG</a
                        >

                </li>
            </ul>
            <div
                class="flex-grow-1 flex-md-grow-0 quit-button h-100 bg-primary font-weight-bolder d-flex align-items-center h4 mb-0"
            >
                <i class="icon-quit mr-md-2 d-none d-lg-inline"></i>
                <div class="d-none d-md-inline-block">QUICK EXIT</div>
                <span class="d-lg-inline-block d-none">ESC</span>
                <div class="d-md-none w-100 text-right d-flex justify-content-end">
                    <div class="hamburger">
                        <i></i>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<footer>
    <div class="container-fluid custom-container">
        <div
            class="font-size-30 font-weight-bolder text-light footer-title text-center"
        >
            ԱՋԱԿՑՈՒԹՅԱՆ ՀԵՌԱԽՈՍԱՀԱՄԱՐՆԵՐ
        </div>
        <div
            class="row flex-column footer-contact-us justify-content-center align-items-center"
        >
            <div class="col-9 col-md-7 first-col">
                <div
                    class="row align-items-center align-items-sm-start justify-content-between text-center text-sm-left"
                >
                    <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
                <span class="text-light d-inline-block mb-2 number-title-am"
                >Ոստիկանություն</span
                >
                        <a
                            href="https://www.police.am"
                            class="font-weight-bolder government-phones d-block text-decoration-none footer-link"
                            target="_blank"
                        >
                            1-02
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
                <span class="text-light d-inline-block mb-2 number-title-am"
                >Արտակարգ իրավիճակներ</span
                >
                        <a
                            href="http://mes.am/"
                            class="font-weight-bolder government-phones d-block text-decoration-none footer-link"
                            target="_blank"
                        >
                            9-11
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 mb-sm-0 mb-lg-0">
                <span class="text-light d-inline-block mb-2 number-title-am"
                >Մարդու իրավունքների պաշտպան</span
                >
                        <a
                            href="https://ombuds.am/"
                            class="font-weight-bolder government-phones d-block text-decoration-none footer-link"
                            target="_blank"
                        >
                            1-16
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 mb-sm-0 mb-lg-0">
                <span class="text-light d-inline-block mb-2 number-title-am"
                >ՀՀ Աշխատանքի և Սոցիալական հարցերի նախարարություն</span
                >
                        <a
                            href="http://www.mlsa.am/"
                            class="font-weight-bolder government-phones d-block text-decoration-none footer-link"
                            target="_blank"
                        >
                            1-14
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-9 col-md-7 second-col pl-4">
                <div
                    class="row text-center align-items-center align-items-md-end text-sm-left"
                >
                    <div class="col-md-6 mb-3 mb-md-0 d-flex justify-content-center">
                        <div class="mb-4 mb-sm-0">
                            <div
                                class="non-governmental-phones-title mb-3 font-weight-bold"
                            >
                                Հասարակական կազմակերպություններ
                            </div>
                            <span class="text-light d-inline-block mb-2"
                            >Կանանց աջակցության կենտրոն</span
                            >
                            <a
                                href="https://www.facebook.com/WomensSupportCenter/"
                                class="font-weight-bolder non-governmental-phones footer-link d-block text-decoration-none"
                            >
                                099 887 808
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2 mb-md-0 d-flex justify-content-center">
                        <div>
                  <span class="text-light d-inline-block"
                  >Սեռական բռնության ճգնաժամային կենտրոն</span
                  >
                            <a
                                href="https://www.facebook.com/saccarmenia/"
                                class="font-weight-bolder non-governmental-phones footer-link d-block text-decoration-none"
                            >
                                077 99 12 80
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <center class="mb-5">
            <a
                href="http://www.mlsa.am/?page_id=19928"
                class="footer-button d-inline-block footer-list-info font-size-20 font-weight-bold  pt-2 pb-2 pl-3 pr-3 text-decoration-none"
                target="_blank"
            >
                Ապաստարանների և աջակցության կենտրոնների ցուցակ
            </a>
        </center>

        <div class="d-flex justify-content-center text-center emblem">
            <div>
                <img
                    src="{{asset("assets/img/emblem.svg")}}"
                    alt="emblem"
                    class="d-inline-block mb-2"
                />
                <small class="text-light d-block">
                    ՀՀ արդարադատության նախարարություն
                </small>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script src="{{asset("assets/js/slider-config.min.js")}}"></script>
<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"
></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"
></script>
<script src="{{asset("assets/js/app.min.js")}}"></script>
</body>
</html>
