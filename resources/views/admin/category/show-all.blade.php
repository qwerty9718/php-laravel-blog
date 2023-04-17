@extends('admin.include.main')
@section('content')

    <div class="container">

        <div class="container">
            <a href="{{route('admin.category.create-form')}}" class="btn btn-success mb-3 mt-3">создать категорию</a>
        </div>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
{{--            @foreach($categories->all() as $category)--}}

{{--                @if(!$category->hasChildren())--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{$category->id}}</th>--}}
{{--                    <td>{{$category->title}}</td>--}}
{{--                    <td>--}}
{{--                        <div class="btn-group" role="group" aria-label="Простой пример">--}}
{{--                            <a href="{{route('admin.category.find-one',$category->id)}}"><i class="fa-solid fa-eye mr-3" style="color: #2f61b6;"></i></a>--}}
{{--                            <a href="{{route('admin.category.edit-form',$category->id)}}"><i class="fa-solid fa-pen-to-square mr-3" style="color: #1bac53;"></i></a>--}}
{{--                            <form action="{{route('admin.category.delete',$category->id)}}" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('delete')--}}
{{--                                <button type="submit" class="border-0 bg-transparent"> <a href=""><i class="fa-solid fa-trash" style="color: #ed0c0c;"></i></a></button>--}}
{{--                            </form>--}}

{{--                        </div>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                @endif--}}

{{--            @endforeach--}}


@foreach($categories as $category)

    @if($category->parent_id != 0 || $category->parent_id == '' )
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->title_ru}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Простой пример">
                    <a href="{{route('admin.category.find-one',$category->id)}}"><i class="fa-solid fa-eye mr-3" style="color: #2f61b6;"></i></a>
                    <a href="{{route('admin.category.edit-form',$category->id)}}"><i class="fa-solid fa-pen-to-square mr-3" style="color: #1bac53;"></i></a>
                    <form action="{{route('admin.category.delete',$category->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border-0 bg-transparent"> <a href=""><i class="fa-solid fa-trash" style="color: #ed0c0c;"></i></a></button>
                    </form>

                </div>
            </td>
        </tr>
    @endif

@endforeach
            </tbody>
        </table>
    </div>



@endsection
