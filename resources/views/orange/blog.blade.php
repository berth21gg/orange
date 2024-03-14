@extends('layout.orange')

@section('main_content')
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{ asset('assets/images/img_bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Our Blog</h1>
                            <h2>Free html5 templates Made by <a href="http://freehtml5.co" target="_blank">freehtml5.co</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-blog" class="fh5co-bg-section">
        <div class="container">
            <div class="row">
                @foreach ($posts as $p)
                    <div class="col-lg-4 col-md-4 flex-grow-1">
                        <div class="fh5co-blog animate-box">
                            <a href="/detail_post/{{ $p->id }}"><img class="img-responsive"
                                    src="{{ asset('assets/images/work-4.jpg') }}" alt=""></a>
                            <div class="blog-text">
                                <h3><a
                                        href="/detail_post/{{ $p->id }}">{{ \Illuminate\Support\Str::limit($p->title, 20) }}</a>
                                </h3> <!-- Limitar el título a 50 caracteres -->
                                <span
                                    class="posted_on">{{ \Illuminate\Support\Carbon::parse($p->created_at)->format('Y-m-d') }}</span>
                                <span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
                                <p>{{ \Illuminate\Support\Str::limit($p->content, 50) }}</p>
                                <!-- Limitar el contenido a 150 caracteres -->
                                <a href="/detail_post/{{ $p->id }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
