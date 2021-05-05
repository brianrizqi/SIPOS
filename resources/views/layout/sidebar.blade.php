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
                @if(Auth::user()->isA('admin'))
                    <li class="sidebar-item ">
                        <a href="{{ route('dashboard.admin.users.index') }}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>List User</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{ route('dashboard.admin.users.create') }}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>Create User</span>
                        </a>
                    </li>
                @elseif(Auth::user()->isA('kader'))
                    <li class="sidebar-item ">
                        <a href="{{ route('dashboard.kader.pregnant.index') }}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>List Ibu Hamil</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{ route('dashboard.kader.pregnant.create') }}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>Create Ibu Hamil</span>
                        </a>
                    </li>
                @elseif(Auth::user()->isA('bidan'))
                    <li class="sidebar-item ">
                        <a href="{{ route('dashboard.bidan.pregnant.service.index') }}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>Layanan Hari Ini</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{ route('dashboard.bidan.pregnant.service.history') }}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>Riwayat Layanan</span>
                        </a>
                    </li>
                @endif
                <li class="sidebar-item ">
                    <a href="#" class='sidebar-link'
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-power"></i>
                        <span>Logout</span>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
