<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <div class="" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('blogs.list')}}">Website</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('blogsAdmin.list')}}">Blog List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
        </ul>
    </div>
</nav>