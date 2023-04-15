    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                        <img src="../../img_admin/sindicato_icono.jpg" alt="logo IADR" width="25%">
                        <h2 class="brand-text mb-0" style="color:#051848; font-size: 18px;">S.T.P.M. "P.A"</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="icon-x d-block d-xl-none font-medium-4 primary toggle-icon feather icon-disc"></i><i class="toggle-icon font-medium-4 d-none d-xl-block collapse-toggle-icon primary feather icon-disc" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="navigation-header"><span>Gestión Administrativa</span>
                </li>
                <li class="nav-item {{ (request()->is('lista-usuarios') || request()->is('nuevo-usuario')? 'active': '' || request()->is('actualizar-usuario/*'))? 'active': '' }}">
                    <a href="{{ route('user.get') }}">
                        <i class="feather icon-users"></i>
                        <span class="menu-title" data-i18n="Chat">Gestión de Usuarios</span>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('lista-staff') || request()->is('nuevo-staff')? 'active': '' || request()->is('actualizar-staff/*') || request()->is('lista-staffSocial/*') || request()->is('nuevo-staffSocial/*') || request()->is('actualizar-staffSocial/*') || request()->is('lista-detalle/*') || request()->is('nuevo-detalle/*') || request()->is('actualizar-detalle/*'))? 'active': '' }}">
                    <a href="{{ route('staff.get') }}">
                        <i class="feather icon-box"></i>
                        <span class="menu-title" data-i18n="Chat">Gestión de Socios</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>