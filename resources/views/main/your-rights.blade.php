@extends("layouts.main-$locale")

@section('content')
    <main class="your-rights">
        @foreach($sections as $section)
            @if($section->type === 4)
                <div class="your-rights-cover bg-secondary">
                    <div class="container-fluid custom-container text-light">
                        @foreach($section->description = explode('</p>', $section->description) as $key => $desc)
                            @if($key +1 !== count($section->description))
                            <div class="font-size-20 mb-3">
                                {{strip_tags($desc)}}
                            </div>
                            @else
                                {!! str_replace(['<ul>', '<li>'], ['<ul class="list-unstyled cover-list">', '<li class="font-size-20 font-weight-bold position-relative">'], $desc) !!}
                            @endif
                        @endforeach
                    </div>
                </div>
            @elseif($section->type === 11)
                <div class="police-intervention">
                    <div class="container-fluid custom-container">
                        <div class="font-weight-bolder font-size-30 mb-3">
                            {{$section->name}}
                        </div>
                        <p class="mb-4">
                            {{strip_tags($section->description)}}
                        </p>
                        <div class="row mb-5">
                            @foreach($section->child as $child)
                            <div class="col-sm-4 mb-3">
                                <div>
                                    <div class="font-weight-bolder text-primary font-size-20 mb-3">
                                        {{$child->name}}
                                    </div>
                                    <div class="font-size-16">
                                        {!! $child->description !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--          <div class="text-center">-->
                        <!--            <a-->
                        <!--              href="#"-->
                        <!--              class="read-more secondary-primary font-weight-bold text-decoration-none"-->
                        <!--            >-->
                        <!--              <span class="mr-1">Read more</span>-->
                        <!--              <span class="icon-read-more"></span>-->
                        <!--            </a>-->
                        <!--          </div>-->
                    </div>
                </div>
            @elseif($section->type === 5)
                <div class="your-rights-doc-list bg-primary">
                    <div class="container-fluid custom-container text-light">
                        <div class="font-weight-bolder font-size-20 mb-5">
                            {{$section->name}}
                        </div>
                        <ul class="list-unstyled white-border-list">
                            @foreach($section->child as $child)
                            <li>
                                <a
                                    href="{{count($child->mainFiles) > 0 ? asset($child->mainFiles[0]->file) : $child->url}}"
                                    target="_blank"
                                    class="d-flex align-items-center doc-container text-decoration-none"
                                >
                                    <span class="icon-document mr-4"></span>
                                    <p class="font-size-18 mb-0">
                                        {{strip_tags($child->description)}}
                                    </p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @elseif($section->type === 2)
                <div class="domestic-violence-description">
                    <div class="container-fluid custom-container">
                        @foreach($section->description as $desc)
                            <p class="m-0">{!!$desc!!}</p>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </main>
@endsection
