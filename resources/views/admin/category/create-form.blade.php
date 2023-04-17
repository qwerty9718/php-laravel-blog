@extends('admin.include.main')
@section('content')

    <div class="container">

        @if(!isset($category))
            <form action="{{route('admin.category.save')}}" method="post">
                @csrf
                <div>
                    <h2>Название Категории</h2>
                    <input type="text" class="form-control w-50" name="title_ru" placeholder="Название ктегории">
                    <h2>Название Категории Eng</h2>
                    <input type="text" class="form-control w-50" name="title" placeholder="Category Title">
                    @error('title')
                    <div class="text-danger">поле не должно быть пустым</div>
                    @enderror

                    <div class="form-group w-25" >
                        <label>Родительская Категория</label>
                        <select class="custom-select" name="parent_id">
                            <option value="">Без Родительской категории</option>
                            @foreach($parent_ids as $parent_id)
                                    @if($parent_id->parent_id == 0 && $parent_id->parent_id != '')
                                <option value="{{$parent_id->id}}">{{$parent_id->title}}/{{$parent_id->title_ru}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" class="btn btn-success btn-sm mt-2" value="Создать">
                </div>
            </form>


            {{--    Создание Родительской Категории    --}}
        <div class="container" style="margin-top: 100px">
            <form action="{{route('admin.category.save')}}" method="post">
                @csrf
                <div>
                    <h2>Название Родительской Категории</h2>
                    <input type="text" class="form-control w-50" name="title_ru" placeholder="Название Родительской Категории">

                    <h2>Название Родительской Категории Eng</h2>
                    <input type="text" class="form-control w-50" name="title" placeholder="Category Title">
                    @error('title')
                    <div class="text-danger">поле не должно быть пустым</div>
                    @enderror
                    <input type="hidden" name="parent_id" value="0">
                    <input type="submit" class="btn btn-success btn-sm mt-2" value="Создать Родитель.Категорию">
                </div>
            </form>
        </div>
        @endif


        @if(isset($category))
            <form action="{{route('admin.category.update',$category->id)}}" method="post">
                @csrf
                @method('patch')
                <div>
                    <h2>Название</h2>
                    <input type="text" class="form-control w-50" name="title_ru" value="{{$category->title_ru}}">

                    <h2>Название Eng</h2>
                    <input type="text" class="form-control w-50" name="title" value="{{$category->title}}">
                    @error('title')
                    <div class="text-danger">поле не должно быть пустым</div>
                    @enderror

                    <div class="form-group w-25" >
                        <label>Родительская Категория</label>
                        <select class="custom-select" name="parent_id">
                            <option value="">Без Родительской категории</option>
                            @foreach($parent_ids as $parent_id)
                                @if($parent_id->parent_id == 0 && $parent_id->parent_id != '')
                                    <option value="{{$parent_id->id}}"{{$category->parent_id == $parent_id->id ? 'selected' : ''}} >{{$parent_id->title}}/{{$parent_id->title_ru}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" class="btn btn-success btn-sm mt-2" value="Обновить">
                </div>
            </form>
        @endif
    </div>



@endsection
