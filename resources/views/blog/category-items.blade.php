@extends('blog.include.main')

@section('gallery')
<div class="wrap-container">
    <!-----------------Content-Box-------------------->
    <div id="main-content" class="zerogrid">
        <div class="wrap-content">


            <div class="row">
                @if($posts->count() > 0)
                @foreach($posts as $post)
                <div class="col-1-3">
                    <div class="wrap-col">
                        <article>
                            <div class="post-thumbnail-wrap">
                                <a href="{{route('blog.single',$post->id)}}" class="portfolio-box">
                                    <img src="{{Storage::url($post->image)}}"   style="width: 300px; height: 250px;object-fit: cover" alt="">
                                    <div class="portfolio-box-second">
                                        @if($post->second_image != null || $post->second_image != '')
                                        <img src="{{Storage::url($post->second_image)}}"   style="width: 300px; height: 250px;object-fit: cover" alt="">
                                        @endif
                                    </div>
                                </a>
                            </div>
                            <div class="entry-header ">
                                <h3 class="entry-title">@if($lang == 'ru'){{$post->title_ru}}@else{{$post->title}}@endif</h3>

                                <div class="l-tags">
                                    @foreach($post->tags as $tag)
                                    <a href="{{route('blog.tag-items',$tag->id)}}">{{$tag->title}}</a>
                                    @endforeach
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p></p>
                                    @auth()
                                        <form action="{{route('blog.post-like',$post->id)}}" method="post">
                                            @csrf
                                            <span>{{$post->likedUsers->count()}}</span>
                                            <button type="submit" class="border-0 bg-transparent">
                                                @if(auth()->user()->likedPosts->contains($post->id))
                                                    {{--like--}}
                                                    <i class="fa-solid fa-heart mt-1"></i>
                                                @else
                                                    {{--No like--}}
                                                    <i class="fa-regular fa-heart mt-1"></i>
                                                @endif

                                            </button>
                                        </form>
                                    @endauth
                                    @guest()
                                        <div>
                                            {{--No like--}}
                                            <span>{{$post->likedUsers->count()}}</span>
                                            <i class="fa-regular fa-heart mt-1"></i>
                                        </div>
                                    @endguest
                                </div>

                            </div>
                        </article>
                    </div>
                </div>
                @endforeach

                @else
                    <div class="container">
                        У этой категории нет постов
                    </div>

                @endif
            </div>
            <div class="mx-auto ">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
