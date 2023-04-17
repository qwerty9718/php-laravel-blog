@extends('cabinet.include.main')
@section('content')


    <div class="container">

        @if(!isset($tag))
            <form action="{{route('cabinet.tag.save')}}" method="post">
                @csrf
                <div>
                    <h2>Название</h2>
                    <input type="text" class="form-control" name="title" placeholder="Category Title">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    @error('title')
                    <div class="text-danger">поле не должно быть пустым</div>
                    @enderror
                    <input type="submit" class="btn btn-success btn-sm mt-2" value="Создать">
                </div>
            </form>
        @endif


        @if(isset($tag))
            <form action="{{route('cabinet.tag.update',$tag->id)}}" method="post">
                @csrf
                @method('patch')
                <div>
                    <h2>Название</h2>

                    <input type="text" class="form-control" name="title" value="{{$tag->title}}">
                    @error('title')
                    <div class="text-danger">поле не должно быть пустым</div>
                    @enderror
                    <input type="submit" class="btn btn-success btn-sm mt-2" value="Обновить">
                </div>
            </form>
        @endif
    </div>

@endsection

