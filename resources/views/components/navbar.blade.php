<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="aside-tools">
        <div class="logo-dashboard">
            <b><a href="/">TicketHelp</a></b>
        </div>
    </div>
    <div class="navbar-brand">
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item dropdown has-divider has-user-avatar mr-6">
                <a class="navbar-link">
                    <div class="is-user-name "><span>{{auth()->user()->username}}</span></div>
                    <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" class="hover:animate-bounce h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
                    </span>
                </a>
                <div class="navbar-dropdown dropdown">
                    @if (Auth::user()->role_id > 1)
                    <a href="{{ url('/admin/profile/') }}" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        <span>Perfil</span>
                    </a>
                    @else
                    <a href="{{ url('/user/profile/') }}" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        <span>Perfil</span>
                    </a>
                    @endif
                    <a href="/admin/settings" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-settings"></i></span>
                        <span>Paràmetres</span>
                    </a>
                    <a href="" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-email"></i></span>
                        <span>Missatges</span>
                    </a>
                    <hr class="navbar-divider">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <button :href="route('logout')" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log Out</span>
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
