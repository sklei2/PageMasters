<!doctype html>
<nav id="mainNavbar" class="navbar navbar-default navbar-static-top" style="margin-bottom: 0;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/books">PageMasters</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/books">Books<span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a href="/cart">Cart</a>
                </li>
                @if(Auth::user()->isRole("admin"))
                <li>
                    <a href="/admin">Book Management</a>
                </li>
                @endif
                @if(Auth::user()->isRole("instructor") or Auth::user()->isRole("admin"))
                <li>
                    <a href="/preferences#manageCourses" id="manageCourses" onclick="window.switchTabs(this.id)">Course Management</a>
                </li>
                @endif
                <li>
                    <a href="/preferences#enrolledCourses" id="enrolledCourses" onclick="window.switchTabs(this.id)">Courses</a>
                </li>
                @if(Auth::user()->isRole("admin"))
                <li>
                    <a href="/coverage">Coverage Report</a>
                </li>
                @endif
            </ul>
            
                @if (Auth::guest())
                <a href="{{ route('login') }}" class="nav navbar-right">
                    Login
                </a>
                @else
                <div class="nav navbar-right dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="profile-dropdown" data-toggle="dropdown"> 
                        {{Auth::user()->name}}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item"> Profile </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"> 
                            Logout
                        </a>
                    </div>
                </div>
                @endif
                
            
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>