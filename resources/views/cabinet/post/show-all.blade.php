@extends('cabinet.include.main')
@section('content')

    <div class="container">

        <div class="container">
            <a href="{{route('cabinet.post.create-form')}}" class="btn btn-success mb-3 mt-3">создать пост</a>
        </div>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">картинки</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td><img src="{{ Storage::url($post->image) }}"  width="40" height="40px"  alt=""></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Простой пример">
                            <a href="{{route('cabinet.post.find-one',$post->id)}}"><i class="fa-solid fa-eye mr-3" style="color: #2f61b6;"></i></a>
                            <a href="{{route('cabinet.post.edit-form',$post->id)}}"><i class="fa-solid fa-pen-to-square mr-3" style="color: #1bac53;"></i></a>
                            <form action="{{route('cabinet.post.delete',$post->id)}}" method="post">
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
