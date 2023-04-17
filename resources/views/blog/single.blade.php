@extends('blog.include.main')

@section('gallery')

    <section id="container">
        <div class="wrap-container container-sm mainDiv">
            <!-----------------Content-Box-------------------->
            <div id="main-content">
                <div class="wrap-content">
                    <div class="row">
                        <article class="single-post zerogrid">
                            <div class="row wrap-post"><!--Start Box-->
                                <div class="entry-header">

                                    <span class="time">{{$time->translatedFormat('F')}} {{$time->day}}  •  {{$time->year}}  •  {{$time->format('H:i')}}  • by {{$post->users->name}}</span>
                                    <h2 class="entry-title">@if($lang == 'ru'){{$post->title_ru}} @else{{$post->title}} @endif</h2>
                                    <span class="cat-links">
                                        @foreach($post->tags as $tag)
                                        <a href="#">{{$tag->title}}</a>
                                        @endforeach
                                    </span>
                                </div>
                                <div class="post-thumbnail-wrap">
                                    <img src="{{ Storage::url($post->image) }}" style="width: 920px; height: 510px;object-fit: cover" alt="">
                                </div>
                                <div class="entry-content">
                                    <div class="excerpt"><p>@if($lang == 'ru'){!! $post->content_ru !!}@else{!! $post->content !!}@endif</p></div>

                                </div>
                            </div>
                        </article>

                        <div class="container-sm" style="max-width: 800px">


                            <div class="post">

                                @auth()
                                <form action="{{route('blog.saveComment')}}" method="post">
                                    @csrf

                                    <input class="form-control form-control-sm" type="text" name="content" placeholder="Type a comment">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                    <input type="hidden" name="user_name" value="{{auth()->user()->name}}">
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <button type="submit" class="btn btn-block btn-dark btn-sm mx-auto mt-2" style="width: 45px;">send</button>
                                </form>
                                @endauth

                                @foreach($comments as $comment)
                                <div class="user-block" style="margin-bottom: -24px">
                                    <img class="img-circle img-bordered-sm"

                                         @if(\App\Models\User::find($comment->user_id)->image == '')
                                         src="../../dist/img/avatar.png"  alt="user image">
                                         @else
                                         src="{{Storage::url(\App\Models\User::find($comment->user_id)->image) }}" style="width: 45px; height: 45px;object-fit: cover;">
                                        @endif
                                    <span class="username" style="margin-top: 32px;">
                          <a href="#">{{$comment->user_name}}</a>

                        </span>
                                    <?$commTime = $comment->time()?>
                                    <span class="description">Shared publicly - {{$commTime->translatedFormat('F')}} {{$commTime->day}}  •  {{$commTime->year}}  •  {{$commTime->format('H:i')}}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>{{$comment->content}}</p>

                                <p>
                                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                    <span class="float-right"><a href="#" class="link-black text-sm"></a></span>
                                </p>
                                @endforeach
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
