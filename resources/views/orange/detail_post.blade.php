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
                            <h1>Post Details</h1>
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
                <div class="col-md-8 col-md-offset-2">
                    <div class="fh5co-blog animate-box">
                        <div class="blog-text">
                            <h2>{{ $post->title }}</h2>
                            <p>Author: {{ $post->author }}</p>
                            <p>Category: {{ $post->category }}</p>
                            <p>Created at: {{ \Illuminate\Support\Carbon::parse($post->created_at)->format('Y-m-d') }}</p>
                            <p>{{ $post->content }}</p>
                            <img class="img-responsive" src="{{ asset($post->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <h3 class="title font-weight-normal mt-0 text-left">LEAVE A COMMENT</h3>
                <div class="col-sm-6">
                    <form action="{{ route('addComment', ['post_id' => $post->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="commenter">Your Name</label>
                            <input type="text" class="form-control" id="commenter" name="commenter" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <div style="height: 250px; overflow: auto; border: 1px solid #ccc; padding: 10px">
                        <h4 class="title font-weight-normal mt-0 text-left" style="margin-bottom: 1rem">COMMENTS
                            ({{ $commentsCount }})</h4>
                        <dl>
                            @foreach ($comment as $c)
                                <dt>{{ $c->commenter }} -
                                    {{ \Illuminate\Support\Carbon::parse($c->created_at)->format('Y/m/d') }}</dt>
                                <dd style="margin-left: 2rem"> {{ $c->comment }}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endsection
