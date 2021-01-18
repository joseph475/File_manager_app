<div class="navbar-fixed">
    <nav class="header-nav">
        <div class="nav-wrapper">
            <div class="header-logo">
                <a href="#!" data-target="slide-out" class="sidenav-trigger left show-on-large">
                    <i class="material-icons white-text">menu</i>
                </a>
                <a href="#!" class="brand-logo hide-on-med-and-down">File Manager</a>
            </div>
            <div class="header-icons">
                {{-- <a href="" class="tooltipped" data-position="left" data-tooltip="Notifications"><i class="material-icons">notifications<span class="new badge notifbadge" data-badge-caption=""></span></i></a>  --}}
                {{-- <a href="{{ url('/HotelInfo') }}" class="tooltipped" data-position="left" data-tooltip="Settings"><i class="fas fa-tools"></i></a> --}}
                <!-- <a href="" class="tooltipped" data-position="left" data-tooltip="Logout"><i class="material-icons">exit_to_app</i></a> -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="tooltipped" data-position="left" data-tooltip="Logout">
                                                <i class="material-icons">exit_to_app</i>
                        <!-- {{ __('Logout') }} -->
                    </a>
                </form>
            </div>
        </div>
    </nav>
</div>
<script>
    
</script>