<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="aside-tools">
        <div class="logo-dashboard">
            <b class="font-black"> TicketHelp</b>
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
            <div class="navbar-item dropdown has-divider has-user-avatar">
                <a class="navbar-link">
                    <div class="user-avatar">
                        <img src="https://img.olympicchannel.com/images/image/private/t_1-1_600/f_auto/v1538355600/primary/nhdekfric5kyv3ng6bpv" alt="Mohamed Bourarach" class="rounded-full">
                    </div>
                    <div class="is-user-name"><span>Nom del perfil</span></div>
                    <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                </a>
                <div class="navbar-dropdown">
                    <a href="" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        <span>Perfil</span>
                    </a>
                    <a href="" class="navbar-item">
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
