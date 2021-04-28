<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="#">SIP</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-item  has-sub">
                    @if(Auth::user()->isA('admin'))
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>User</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{ route('dashboard.admin.users.index') }}">List User</a>
                                <a href="{{ route('dashboard.admin.users.create') }}">Create User</a>
                            </li>
                        </ul>
                    @elseif(Auth::user()->isA('kader'))
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>Ibu Hamil</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{ route('dashboard.kader.pregnant.index') }}">List Ibu Hamil</a>
                                <a href="{{ route('dashboard.kader.pregnant.create') }}">Create Ibu Hamil</a>
                            </li>
                        </ul>
                    @endif
                    <br>
                    <a href="#" class='sidebar-link'
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-power"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
