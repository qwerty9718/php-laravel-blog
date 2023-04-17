@extends('blog.include.main')

@section('slider')
    <div id="owl-slide" class="owl-carousel">
        @foreach($slider as $item)
            <div class="item">
                <img src="{{ Storage::url($item->image) }}" style="width:1600px; height: 800px;object-fit: cover"
                     alt=""/>
            </div>
        @endforeach
    </div>
@endsection

@section('gallery')


    <section class="content-box box-style-1 box-2">
        <div class="zerogrid">
            <div class="wrap-box"><!--Start Box-->
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-1-3">
                            <div class="wrap-col">
                                <article>
                                    <div class="post-thumbnail-wrap">
                                        <a href="{{route('blog.single',$post->id)}}" class="portfolio-box">
                                            <img src="{{ Storage::url($post->image) }}"
                                                 style="width: 300px; height: 300px;object-fit: cover" alt="">
                                            <div class="portfolio-box-second">
                                                @if($post->second_image != null || $post->second_image != '')
                                                    <img src="{{ Storage::url($post->second_image) }}"
                                                         style="width: 300px; height: 300px;object-fit: cover" alt="">
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="entry-header ">
                                        <a href="{{route('blog.single',$post->id)}}"><h3 class="entry-title">@if($lang == 'ru'){{$post->title_ru}}@else{{$post->title}} @endif</h3></a>
                                        <div class="l-tags">
                                            @foreach($post->tags as $tag)
                                                <a href="{{route('blog.tag-items',$tag->id)}}">{{$tag->title}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p></p>
                                        @auth()
                                            <form action="{{route('blog.post-like',$post->id)}}" method="post">
                                                @csrf
                                                <span>{{$post->likedUsers->count()}}</span>
                                                <button type="submit" class="border-0 bg-transparent">
                                                    @if(auth()->user()->likedPosts->contains($post->id))
                                                        {{--  like--}}
                                                        <i class="fa-solid fa-heart mt-1"></i>
                                                    @else
                                                        {{--  No like--}}
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
                                </article>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mx-auto ">
                    {{$posts->links()}}
                </div>

            </div>
        </div>
    </section>

@endsection

@section('aboutUs_Like')
    <section class="content-box box-3">
        <div class="zerogrid">
            <div class="wrap-box"><!--Start Box-->
                <div class="box-header">
                    <h2>OUR PHILOSOPHY</h2>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-1-2">
                            <div class="wrap-col">
                                <p>@lang('home.our1')</p>
                            </div>
                        </div>
                        <div class="col-1-2">
                            <div class="wrap-col">
                                <p>@lang('home.our2')</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <blockquote><p>@lang('home.mostPopular')</p></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-----------------content-box-4-------------------->
    <section class="content-box box-style-1 box-4">
        <div class="zerogrid" style="width: 100%">
            <div class="wrap-box"><!--Start Box-->


                @for($i = 0; $i<$likesPosts->count(); $i++ )
                    <div class="row">
                        <article>
                            @if($i % 2 != 0)
                                <div class="col-1-2">
                                    @else
                                        <div class="col-1-2 f-right">
                                            @endif

                                            <img src="{{ Storage::url($likesPosts[$i]->image) }}"
                                                 style="width: 950px; height: 530px;object-fit: cover" alt="">
                                        </div>
                                        <div class="col-1-2">
                                            <div class="entry-content t-center">
                                                <h3>@if($lang == 'ru'){{$likesPosts[$i]->title_ru}} @else{{$likesPosts[$i]->title}} @endif</h3>
                                                <div class="items-text">
                                                    @if($lang == 'ru'){!! $likesPosts[$i]->content_ru !!} @else{!! $likesPosts[$i]->content !!}  @endif
                                                </div>
                                                <a class="button" href="{{route('blog.single',$likesPosts[$i]->id)}}">Read More</a>
                                            </div>
                                        </div>
                        </article>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
