@extends("layouts.main-$locale")

@section('content')
    <main class="home">
        @foreach($sections as $section)
            @if($section->type === 6)
                <div class="cover">
                    <div
                        class="container-fluid custom-container h-100 d-flex align-items-end align-items-md-center"
                    >
                        <div class="mb-4 mb-md-0">
                            <h1 class="font-weight-bolder text-light">
                                {{$section->name}}
                            </h1>
                            <ul class="list-unstyled">
                                @foreach($section->description as $desc)
                                    <li class="mb-3">
                                        <div
                                            class="d-inline-block text-light font-weight-bolder text-uppercase"
                                        >
                                            {{$desc}}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @elseif($section->type === 4)
                <div class="home-description bg-secondary">
                    <div class="container-fluid custom-container text-center text-light">
                        {{strip_tags($section->description)}}
                    </div>
                </div>
            @elseif($section->type === 12)
            <div class="images">
                <div class="container-fluid custom-container text-center">
                  <div class="row">
                    @foreach($section->mainFiles as $file)
                        <div class="col-sm-4 mb-4 mb-sm-0">
                          <img
                            src="{{asset($file->file)}}"
                            class="w-100"
                            alt="vision"
                          />
                        </div>
                    @endforeach
                  </div>
                </div>
          </div>
            @elseif($section->type === 7)
                <div class="video-slider">
                    <div class="container-fluid custom-container text-center">
                        <h4 class="text-secondary text-uppercase font-weight-bolder mb-0">
                            {{$section->name}}
                        </h4>
                    </div>
                    <div class="container-fluid custom-container">
                        <div id="image-slider" class="splide mb-5">
                            <div
                                class="splide__arrows container-fluid custom-container position-absolute"
                            >
                                <button class="splide__arrow splide__arrow--prev">
                                    <span class="icon-arrow font-size-40"></span>
                                </button>
                                <button class="splide__arrow splide__arrow--next">
                                    <span class="icon-arrow font-size-40"></span>
                                </button>
                            </div>
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach($section->mainFiles as $file)
                                        <li class="splide__slide position-relative">
                                            <video class="video">
                                                <source src="{{asset($file->file)}}" type="video/mp4"/>
                                                <!--                  <source src="mov_bbb.ogg" type="video/ogg">-->
                                                Your browser does not support HTML video.
                                            </video>
                                            <img
                                                src="{{asset("assets/img/play.svg")}}"
                                                class="position-absolute play"
                                                alt="play"
                                            />
                                            <img
                                                src="{{asset("assets/img/pause.svg")}}"
                                                class="position-absolute pause"
                                                alt="play"
                                            />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div
                            class="thumbnails justify-content-center js-thumbnails d-none d-md-flex"
                        >
                            <ul
                                class="thumbnails__list d-flex list-unstyled justify-content-center mb-0"
                            >
                                @foreach($section->files as $file)
                                    <li class="thumbnails__item mr-5" role="button" tabindex="0">
                                        <img src="{{asset($file->preview)}}" alt="Thumbnail 01"/>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </main>
@endsection
