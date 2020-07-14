<nav class="navigation-menu">
    <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{ route('dashboard') }}" class="index-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
        {{-- <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fab fa-accusoft"></i>
                <span>Menu</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="#">dropdown menu 1</a></li>
                <li><a href="#">dropdown menu 2</a></li>
            </ul>
        </li> --}}
        {{--   for category    --}}
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fab fa-accusoft"></i>
                <span>Category</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('category.list') }}">Category List</a></li>
                <li><a href="{{ route('category.create') }}">Category Create</a></li>
                <li><a href="{{ route('sub-category.list') }}">Sub Category List</a></li>
                <li><a href="{{ route('sub-category.create') }}">Sub Category Create</a></li>
            </ul>
        </li>

        {{-- slider list --}}
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fab fa-accusoft"></i>
                <span>Slider Manage</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('slider.list') }}">Slider list</a></li>
                <li><a href="{{ route('slider.create') }}">Add slider</a></li>
            </ul>
        </li>

        {{-- slider list --}}
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fab fa-accusoft"></i>
                <span>User Manage</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('user.list') }}">User list</a></li>
            </ul>
        </li>
    </ul>
</nav>
