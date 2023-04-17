@extends('cabinet.include.main')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if(auth()->user()->image == '' || auth()->user()->image == null)
                                <img class="profile-user-img img-fluid img-circle"
                                     src="../../dist/img/avatar.png" alt="User profile picture">
                                @else

                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{Storage::url(auth()->user()->image) }}" style="width: 126px; height: 128px;object-fit: cover;" alt="User profile picture">
                                @endif
                            </div>

                            <h3 class="profile-username text-center">{{auth()->user()->email}}</h3>

                            <p class="text-muted text-center">{{auth()->user()->name}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Посты</b> <a class="float-right">{{auth()->user()->posts->count()}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Лайки</b> <a class="float-right">{{$likes}}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                                        data-toggle="tab">Посты</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline"
                                                        data-toggle="tab">Комментарии</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                {{--Посты--}}
                                <div class="active tab-pane" id="activity">


                                @foreach($posts as $post)
                                    <!-- /.col -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                     @if(auth()->user()->image == '' ||auth()->user()->image == null)
                                                     src="../../dist/img/avatar.png">
                                                     @else
                                                    src="{{Storage::url(auth()->user()->image) }}" style="width: 45px; height: 45px;object-fit: cover;">
                                                     @endif
                                                <span class="username">
                          <a href="#">{{auth()->user()->name}}</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                                <span class="description">{{$post->getTime()->translatedFormat('F')}} {{$post->getTime()->day}}  •  {{$post->getTime()->year}}  •  {{$post->getTime()->format('H:i')}}</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">

                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6 mb-1">
                                                            <img class="img-fluid" src="{{Storage::url($post->image) }}"
                                                                 style="width: 920px; height: 510px;object-fit: cover;"
                                                                 alt="Photo">
                                                            {{--                                                        <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">--}}
                                                            <div class="row" style="height: 515px">
                                                                <div class="container-fluid wrap-col">
                                                                    <p>{!! $post->content !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-6">
                                                            {{--                                                        <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg"  style="width: 920px; height: 510px;object-fit: cover"  alt="Photo">--}}
                                                            <div class="row" style="height: 515px">
                                                                <div class="container-fluid wrap-col">
                                                                    <div class="d-flex justify-content-center">
                                                                        <h2>{{$post->title}}</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <img class="img-fluid"
                                                                 src="{{Storage::url($post->second_image) }}"
                                                                 style="width: 920px; height: 510px;object-fit: cover"
                                                                 alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>

                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>

                                    @endforeach

                                </div>
                                {{--Комментарии--}}
                                <div class="tab-pane" id="timeline">

                                    @foreach($comments as $comment)
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                 @if(auth()->user()->image == '' || auth()->user()->image == null)
                                                 src="../../dist/img/avatar.png">
                                                 @else
                                                src="{{Storage::url(auth()->user()->image) }}" style="width: 45px; height: 45px;object-fit: cover;">
                                                 @endif
                                            <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                            <span class="description">{{$comment->time()->translatedFormat('F')}} {{$comment->time()->day}}  •  {{$comment->time()->year}}  •  {{$comment->time()->format('H:i')}}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>{{$comment->content}}</p>

                                    </div>
                                    @endforeach

                                </div>


                                <!-- Настройки -->
                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal mb-5" action="{{route('cabinet.user.name')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control w-50" placeholder="{{auth()->user()->name}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>


                                    <div class="tab-pane" id="settings">
                                        <form action="{{ route('update-password') }}" method="POST">
                                            @csrf
                                            <div class="card-body">
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @elseif (session('error'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif


                                                    <div class="form-group row">
                                                        <label for="inputPass" class="col-sm-2 col-form-label">Old Password</label>
                                                        <div class="col-sm-10">
                                                            <input name="old_password" type="password" class="w-50  form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                                                   placeholder="Old Password">
                                                            @error('old_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="newPasswordInput" class="col-sm-2 col-form-label">New Password</label>
                                                        <div class="col-sm-10">
                                                            <input name="new_password" type="password" class="w-50 form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                                                   placeholder="New Password">
                                                            @error('new_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="newPasswordInput" class="col-sm-2 col-form-label">Confirm New Password</label>
                                                        <div class="col-sm-10">
                                                            <input name="new_password_confirmation" type="password" class="w-50 form-control" id="confirmNewPasswordInput"
                                                                   placeholder="Confirm New Password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button class="btn btn-danger">Submit</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </form>
                                    </div>



                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal mb-5" action="{{route('update-image')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>


                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

