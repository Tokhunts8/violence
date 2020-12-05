@extends("layouts.main-$locale")

@section('content')
    <main class="domestic-violence">
        @foreach($sections as $section)
            @if($section->type === 2)
                <div class="domestic-violence-description">
                    <div class="container-fluid custom-container">
                        @foreach($section->description as $desc)
                            <p class="m-0">{{strip_tags($desc)}}</p>
                        @endforeach
                    </div>
                </div>
            @elseif($section->type === 3)
                <div class="domestic-violence-types bg-primary">
                    <div class="container-fluid custom-container text-light">
                        <div class="font-weight-bolder font-size-20 mb-5">
                            {{strip_tags($section->description)}}
                        </div>
                        <div id="accordion">
                            <ul class="list-unstyled white-border-list mb-5">
                                @foreach($section->child as $child)
                                    <li class="card bg-primary">
                                        <div
                                            class="font-size-24 font-weight-bolder card-header p-0 bg-primary border-0"
                                            data-toggle="collapse"
                                            data-target="#domestic{{$child->id}}"
                                        >
                                            {{$child->name}}
                                        </div>
                                        <div id="domestic{{$child->id}}" class="collapse">
                                            <div class="pt-2">
                                                {!! str_replace(['<p>', '<ul>'], ['<p class="font-size-18 mb-0">', '<ul class="inner-list">'], $child->description) !!}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--          <div class="text-right">-->
                        <!--            <a-->
                        <!--              href="#"-->
                        <!--              class="read-more white-secondary font-weight-bold text-decoration-none"-->
                        <!--            >-->
                        <!--              <span class="mr-1">Read more</span>-->
                        <!--              <span class="icon-read-more"></span>-->
                        <!--            </a>-->
                        <!--          </div>-->
                    </div>
                </div>
            @endif
        @endforeach
    </main>
@endsection
