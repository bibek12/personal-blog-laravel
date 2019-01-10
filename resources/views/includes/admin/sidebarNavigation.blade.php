
<div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">User</li>

                    <li class="nav-item">
                        <a href="{{Route('userDashboard')}}" class="nav-link {{Route::currentRouteName()=='userDashboard'?'active':''}}">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{Route('userComment')}}" class="nav-link {{Route::currentRouteName()=='userComment'?'active':''}}">
                            <i class="icon icon-book-open"></i> Comment
                        </a>
                    </li>
                   @if(Auth::user()->author==true)
                    <li class="nav-title">Author</li>

                    <li class="nav-item">
                        <a href="{{Route('authorDashboard')}}" class="nav-link {{Route::currentRouteName()=='authorDashboard'?'active':''}}">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{Route('authorPost')}}" class="nav-link {{Route::currentRouteName()=='authorPost'?'active':''}}">
                            <i class="icon icon-paper-clip"></i> Post
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="{{Route('authorComment')}}" class="nav-link {{Route::currentRouteName()=='authorComment'?'active':''}}">
                            <i class="icon icon-book-open"></i> Comment
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->admin==true)
                    <li class="nav-title">Admin</li>

                    <li class="nav-item">
                        <a href="{{Route('adminDashboard')}}" class="nav-link {{Route::currentRouteName()=='adminDashboard'?'active':''}}">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{Route('adminPost')}}" class="nav-link {{Route::currentRouteName()=='adminPost'?'active':''}}">
                            <i class="icon icon-paper-clip"></i> Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{Route('adminProducts')}}" class="nav-link {{Route::currentRouteName()=='adminProducts'?'active':''}}">
                            <i class="icon icon-basket"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{Route('adminComment')}}" class="nav-link {{Route::currentRouteName()=='adminComment'?'active':''}}">
                            <i class="icon icon-book-open"></i> Comment
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{Route('adminUser')}}" class="nav-link {{Route::currentRouteName()=='adminUser'?'active':''}}">
                            <i class="icon icon-user"></i> User
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>