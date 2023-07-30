<header id="page-topbar">
    <div class="navbar-header bg-light">
        <div class="d-flex bg-light">
            <div class="navbar-brand-box bg-light d-grid">
                <a href="" class="logo">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/psico-sm.png') }}" alt="" width="40">
                    </span>
                    <span class="logo-lg p-2">
                        <img src="{{ asset('assets/images/psico.png') }}" alt="" width="90%">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/default.png') }}"
                        alt="Img Profile">
                    <span class="d-none d-xl-inline-block ms-1"
                        key="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <span key="t-profile">Perfil</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                        <span key="t-profile">Configuraciones</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i>
                        <span key="t-my-wallet">Soporte</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#"><i
                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                            key="t-logout">Cerrar sesión</span></a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Inicio</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect {{ request()->is('/Inicio*') ? 'active' : '' }}">
                        <i class="bx bx-home"></i>
                        <span key="t-chat">Inicio</span>
                    </a>
                </li>
                <li class="menu-title" key="t-menu">Empleados</li>
                <li>
                    <a href="{{ route('employees.get') }}"
                        class="waves-effect {{ request()->is('/Empleados*') ? 'active' : '' }}">
                        <i class="fas fa-people-carry"></i>
                        <span key="t-chat">Empleados</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('config.get') }}"
                        class="waves-effect {{ request()->is('/Configuración*') ? 'active' : '' }}">
                        <i class="fas fa-cogs"></i>
                        <span key="t-chat">Cargos, Áreas y Roles</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
