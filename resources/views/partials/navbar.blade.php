{{-- Navbar --}}
<div class="navbar navbar-inverse navbar-static-top">

    {{-- Container for navbar components --}}
    <div class="container-fluid">

        {{-- Navbar header --}}
        <div class="navbar-header">
            <a href="/" class="navbar-brand">Share Markdown</a>
        </div>
        {{-- /Navbar header --}}

        {{-- Navabar components for signed users --}}
        @if (Auth::check())
            {{-- Navbar links --}}
            <ul class="nav navbar-nav">
                <li><a href="{{ route('documents.create') }}">New document</a></li>
                <li><a href="{{ route('documents.index') }}">My documents</a></li>
            </ul>
            {{-- /Navbar links --}}

            {{-- User info --}}
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div class="user-avatar">
                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                    </div>
                </li>
                <li><p class="navbar-text">{{ Auth::user()->name }}</p></li>
                <li><a href="{{ route('auth.logout') }}">Logout</a></li>
            </ul>
            {{-- /User info --}}
        @endif
        {{-- /Navabar components for signed users --}}

    </div>
    {{-- /Container for navbar components --}}

</div>
{{-- /Navbar --}}

