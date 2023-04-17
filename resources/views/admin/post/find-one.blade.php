@extends('admin.include.main')
@section('content')

    <div class="container">
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
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td><img src="{{ Storage::url($post->image) }}"  width="40" height="40px"  alt=""></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Простой пример">
                            <a href="{{route('admin.post.edit-form',$post->id)}}"><i class="fa-solid fa-pen-to-square mr-3" style="color: #1bac53;"></i></a>
                            <form action="{{route('admin.post.delete',$post->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0 bg-transparent"> <a href=""><i class="fa-solid fa-trash" style="color: #ed0c0c;"></i></a></button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div><h2>Category : {{$category->title}} </h2></div>
        <div><h2>Tags : @foreach($tags as $tag) {{$tag->title}}, @endforeach</h2></div>
    </div>



@endsection
