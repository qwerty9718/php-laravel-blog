<!-- Sidebar -->
<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            {{--         Home          --}}
            <li class="nav-item">
                <a href="{{route('cabinet.index')}}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <p>Главная</p>
                </a>
            </li>


            {{--         Посты           --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <p class="ml-1">Мои Посты<i class="fas fa-angle-left right"></i>  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('cabinet.post.show-all')}}" class="nav-link">
                            <i class="fa-regular fa-paste"></i>
                            <p>Все Посты</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('cabinet.post.create-form')}}" class="nav-link">
                            <i class="fa-solid fa-plus"></i>
                            <p>Добавить Пост</p>
                        </a>
                    </li>

                </ul>
            </li>

            {{--         Тэги           --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-tag"></i>
                    <p class="ml-1">Мои Тэги<i class="fas fa-angle-left right"></i>  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('cabinet.tag.show-all')}}" class="nav-link">
                            <i class="fa-solid fa-tags"></i>
                            <p>Все Теги</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('cabinet.tag.create-form')}}" class="nav-link">
                            <i class="fa-solid fa-plus"></i>
                            <p>Добавить Тэг</p>
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
