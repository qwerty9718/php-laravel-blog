@extends('admin.include.main')
@section('content')

    <div class="container">

        <div class="container">
            <a href="{{route('admin.tag.create-form')}}" class="btn btn-success mb-3 mt-3">создать тэг</a>
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
            @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>{{$tag->title}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Простой пример">
                            <a href="{{route('admin.tag.find-one',$tag->id)}}"><i class="fa-solid fa-eye mr-3" style="color: #2f61b6;"></i></a>
                            <a href="{{route('admin.tag.edit-form',$tag->id)}}"><i class="fa-solid fa-pen-to-square mr-3" style="color: #1bac53;"></i></a>
                            <form action="{{route('admin.tag.delete',$tag->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0 bg-transparent"> <a href=""><i class="fa-solid fa-trash" style="color: #ed0c0c;"></i></a></button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
