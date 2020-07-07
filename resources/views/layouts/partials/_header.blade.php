<!-- header-area -->
<header class="header-area">
    <div class="hide-nav">
        <div class="icon-bar"></div>
        <div class="icon-bar"></div>
        <div class="icon-bar"></div>
    </div>
    <nav class="navbar">
        <div class="search-form">
            <form action="">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="navbarForm" placeholder="Search Keyword......">
                </div>
            </form>
        </div>
        <div class="header-nav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="messageDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fas fa-envelope"></i></a>
                    <div class="dropdown-menu" aria-labelledby="messageDropdown">
                        <div class="dropdown-header"></div>
                        <div class="dropdown-body">

                        </div>
                        <div class="dropdown-footer"></div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="notificationDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fas fa-bell"></i></a>
                    <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                        <div class="dropdown-header"></div>
                        <div class="dropdown-body">

                        </div>
                        <div class="dropdown-footer"></div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="userDrowdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fas fa-user"></i></a>
                    <div class="dropdown-menu user-dropdown" aria-labelledby="userDrowdown">
                        <div class="dropdown-body">
                            <div class="user-img">
                                <img src="#" alt="">
                            </div>
                            <div class="user-title text-center">
                                <h3>{{ Auth::user()->name }}</h3>
                            </div>
                            <div class="user-nav">
                                <ul>
                                    <li><a href=""><i class="fas fa-user"></i> <span>Profile</span></a></li>
                                    <li><a href="{{ route('change-password') }}"><i class="fas fa-key"></i> <span>Change Password</span></a></li>
                                    <li><a href=""><i class="fas fa-cog"></i> <span>Settings</span></a></li>
                                    <li><a href="{{ route('logout') }}"><i class="fas fa-lock"></i> <span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>