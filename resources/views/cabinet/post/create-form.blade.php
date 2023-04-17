@extends('cabinet.include.main')
@section('content')

    <div class="container">

        @if(!isset($post))
            <form action="{{route('cabinet.post.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Заголовок Поста</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Название">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Контент</label>
                        <textarea id="summernote" name="content">{{old('content')}}</textarea>
                        @error('content')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group w-25" >
                        <label>Категория</label>
                        <select class="custom-select" name="category_id">
                            <option selected>выберите категорию</option>
                            @foreach($categories as $category)
                                @if($category->parent_id == '' || $category->parent_id > 0)
                                <option value="{{$category->id}}"
                                    {{$category->id == old('category_id') ? 'selected' : ''}}
                                >{{$category->title}}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('category_id')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group w-50">
                        <label>Тэги</label>
                        <select class="select2" multiple="multiple" name="tags[]" data-placeholder="Select a State" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option {{is_array(old('tags')) && in_array($tag->id , old('tags')) ? 'selected' : '' }} value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="main_image">главное изображение</label>
                        <input type="file" name="image">
                        @error('image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="second_image">доп. изображение</label>
                        <input type="file" name="second_image" >
                        @error('second_image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        @endif







            @if(isset($post))
                <form action="{{route('cabinet.post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Заголовок Поста</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" placeholder="Название">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Контент</label>
                            <textarea id="summernote" name="content">{{$post->content}}</textarea>
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group w-25" >
                            <label>Категория</label>
                            <select class="custom-select" name="category_id">
                                <option selected>выберите категорию</option>
                                @foreach($categories as $category)
                                    @if($category->parent_id == '' || $category->parent_id > 0)
                                    <option value="{{$category->id}}"
                                        {{$category->id == $post->category_id ? 'selected' : ''}}
                                    >{{$category->title}}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('category_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group w-50">
                            <label>Тэги</label>
                            <select class="select2" multiple="multiple" name="tags[]" data-placeholder="Select a State" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option {{is_array($post->tags->pluck('id')->toArray() ) && in_array($tag->id , $post->tags->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{$tag->id}}">{{$tag->title}}</option>
                                    {{--                                        <option {{ $post->tags->contains($tag->id) ? 'selected' : '' }} value="{{$tag->id}}">{{$tag->title}}</option>--}}
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="main_image">главное изображение</label>
                            <input type="file" name="image">
                            <img src="{{ Storage::url($post->image) }}"  height="75px" width="65px"  alt="">
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="second_image">доп. изображение</label>
                            <input type="file" name="second_image" >
                            <img src="{{ Storage::url($post->second_image) }}"   height="75px" width="65px"   alt="">
                            @error('second_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            @endif


    </div>



@endsection
