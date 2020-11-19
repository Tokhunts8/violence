@extends("layouts.main-$locale")

@section('content')
    <main class="statistics">
        @foreach($sections as $section)
            @if($section->type === 8)
                <div class="statistics-cover bg-primary">
                    <div class="container-fluid custom-container text-light">
                        <div
                            class="row align-items-center justify-content-between statistics-cover-title-container"
                        >
                            <div class="col-10 col-sm-9 col-md-7 mb-5 mb-md-0">
                                <div class="font-weight-bolder font-size-40 mb-3">
                                    {{$section->name}}
                                </div>
                                <span
                                >{{strip_tags($section->description)}}
              </span>
                            </div>
                            <div class="text-center col-md-4">
                                <img src="{{asset($section->mainFiles[0]->file)}}" class="w-100" alt=""/>
                            </div>
                        </div>
                        <div class="text-right text-md-left">
                            <a
                                href="{{$section->url}}"
                                class="read-more secondary-white font-weight-bold text-decoration-none"
                                target="_blank"
                            >
                                <span class="mr-1">Read more</span>
                                <span class="icon-read-more"></span>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="statistics-content">
                    <div class="container-fluid custom-container">
                        @if($section->type === 9)
                            <div class="mb-5">
                                <div class="font-weight-bolder font-size-30 mb-4">
                                    {{$section->name}}
                                </div>

                                @foreach($section->mainFiles as $file)
                                    @if($file !== $section->mainFiles[count($section->mainFiles) - 1])
                                        <img
                                            src="{{asset($file->file)}}"
                                            class="mb-5 d-block w-100"
                                            alt="chart"
                                        />
                                    @endif
                                @endforeach
                                <div
                                    class="d-flex justify-content-between flex-column flex-md-row align-items-md-center"
                                >
                                    <div class="text-primary mb-3 mb-md-0">
                                        {!! strip_tags($section->description, '<strong>') !!}
                                    </div>
                                    <div class="text-right text-md-left">
                                        <a
                                            href="{{asset($section->mainFiles[count($section->mainFiles) - 1]->file)}}"
                                            class="read-more secondary-primary font-weight-bold text-decoration-none"
                                            target="_blank"
                                        >
                                            <span class="mr-1">Read more</span>
                                            <span class="icon-read-more"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @elseif($section->type === 10)
                            <div class="mb-5">
                                <div class="font-weight-bolder font-size-30 mb-4">
                                    {{$section->name}}
                                </div>
                                <div class="mb-5">
                                    @foreach($section->charts as $chart)
                                        <div class="row mb-4">
                                            <div class="col-5 col-md-6 d-flex justify-content-end">
                                                <div class="bg-primary h-100" style="width: {{$chart->value}}%"></div>
                                            </div>
                                            <div
                                                class="col flex-grow-0 text-secondary font-weight-bolder font-size-40 violence-percent"
                                            >
                                                {{$chart->value}}%
                                            </div>
                                            <div
                                                class="col-6 offset-5 offset-md-0 col-md-4 flex-grow-18 text-secondary d-flex align-items-center"
                                            >
                                                {{$chart->name}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @foreach($section->description = explode('<p>', $section->description) as $desc)
                                    @if($desc !== $section->description[count($section->description) -1])
                                        <p class="font-size-20">
                                            {!! str_replace(['<strong>', '</strong>'], ['<span class="text-secondary font-weight-bolder font-size-30"
                                            >', '</span>'], $desc) !!}
                                        </p>
                                    @else
                                        <div
                                            class="d-flex justify-content-between flex-column flex-md-row align-items-md-center"
                                        >
                                            <div class="text-primary mb-3 mb-md-0">
                                                {!! $desc !!}
                                            </div>
                                            <div class="text-right text-md-left">
                                                <a
                                                    href="{{$section->url}}"
                                                    class="read-more secondary-primary font-weight-bold text-decoration-none"
                                                    target="_blank"
                                                >
                                                    <span class="mr-1">Read more</span>
                                                    <span class="icon-read-more"></span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        @elseif($section->type === 5)
                            <div>
                                <div class="font-weight-bolder font-size-30 mb-4">
                                    {{$section->name}}
                                </div>
                                <div class="statistics-reports">
                                    <div class="row">
                                        @foreach($section->child as $child)
                                            <div class="col-md-6 mb-4 mb-md-0">
                                                <a href="{{$child->url}}"
                                                   target="_blank"
                                                   class="d-flex align-items-center doc-container text-decoration-none">
                                                    <i class="icon-document mr-4"></i>
                                                    <div>
                                                        <div class="font-weight-bold font-size-20">
                                                            {{$child->name}}
                                                        </div>
                                                        <span
                                                            class="font-weight-bold font-size-20">{!! strip_tags($child->description) !!}
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </main>
@endsection
