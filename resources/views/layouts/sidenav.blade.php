<ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
        <div class="user-view">
            <a><img class="circle" src="{{ url('/images/account4.png') }}"></a>
            <p class="name">
                <span class="user" data-userId="{{ Auth::id() }}"> {{ Auth::user()->name }}<br>
                Administrator
            </p>
        </div>
    </li>
    <li><a href="{{ url('/dashboard') }}"><i class="material-icons">dashboard</i>Dashboard</a></li>
    <li><a href="{{ url('/upload') }}"><i class="material-icons">cloud_upload</i>Upload Files</a></li>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                <i class="material-icons">exit_to_app</i>Log Out
                <!-- {{ __('Logout') }} -->
            </a></li>
    </form>
</ul>