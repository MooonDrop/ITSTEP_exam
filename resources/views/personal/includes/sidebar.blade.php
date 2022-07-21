<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="mt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('personal.index') }}" class="nav-link">
                    <p>
                        <i class="nav-icon fa-solid fa-house"></i>
                        Home
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.like.index') }}" class="nav-link">
                    <p>
                        <i class="nav-icon fa-solid fa-heart"></i>
                        Liked posts
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.comment.index') }}" class="nav-link">
                    <p>
                        <i class="nav-icon fa-solid fa-comment"></i>
                        Comments
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('main.index') }}" class="nav-link">
                    <p>
                        <i class="nav-icon fa-solid fa-arrow-right-from-bracket"></i>
                        To blog
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
