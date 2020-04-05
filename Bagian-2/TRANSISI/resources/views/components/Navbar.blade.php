<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <svg width="187" height="50" viewBox="0 0 187 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.472 34H18.36V20.368H23.736V17.2H9.096V20.368H14.472V34ZM40.7079 34L36.9399 28.6C39.1239 27.664 40.3959 25.816 40.3959 23.296C40.3959 19.528 37.5879 17.2 33.0999 17.2H25.8279V34H29.7159V29.32H33.0999H33.2919L36.5319 34H40.7079ZM36.4599 23.296C36.4599 25.12 35.2599 26.224 32.8839 26.224H29.7159V20.368H32.8839C35.2599 20.368 36.4599 21.448 36.4599 23.296ZM56.0284 34H60.1084L52.5964 17.2H48.7564L41.2684 34H45.2524L46.7404 30.4H54.5404L56.0284 34ZM47.9884 27.448L50.6524 21.016L53.3164 27.448H47.9884ZM73.4194 17.2V27.4L65.0674 17.2H61.8514V34H65.6914V23.8L74.0674 34H77.2594V17.2H73.4194ZM86.7542 34.288C91.5542 34.288 93.8822 31.888 93.8822 29.08C93.8822 22.912 84.1142 25.048 84.1142 21.952C84.1142 20.896 85.0022 20.032 87.3062 20.032C88.7942 20.032 90.4022 20.464 91.9622 21.352L93.1622 18.4C91.6022 17.416 89.4422 16.912 87.3302 16.912C82.5542 16.912 80.2502 19.288 80.2502 22.144C80.2502 28.384 90.0182 26.224 90.0182 29.368C90.0182 30.4 89.0822 31.168 86.7782 31.168C84.7622 31.168 82.6502 30.448 81.2342 29.416L79.9142 32.344C81.4022 33.496 84.0902 34.288 86.7542 34.288ZM96.5389 34H100.427V17.2H96.5389V34ZM109.934 34.288C114.734 34.288 117.062 31.888 117.062 29.08C117.062 22.912 107.294 25.048 107.294 21.952C107.294 20.896 108.182 20.032 110.486 20.032C111.974 20.032 113.582 20.464 115.142 21.352L116.342 18.4C114.782 17.416 112.622 16.912 110.51 16.912C105.734 16.912 103.43 19.288 103.43 22.144C103.43 28.384 113.198 26.224 113.198 29.368C113.198 30.4 112.262 31.168 109.958 31.168C107.942 31.168 105.83 30.448 104.414 29.416L103.094 32.344C104.582 33.496 107.27 34.288 109.934 34.288ZM119.719 34H123.607V17.2H119.719V34Z" fill="#e2e2e2"/>
                <path d="M140.434 34H143.698L136.114 17.2H133.042L125.482 34H128.698L130.354 30.112H138.754L140.434 34ZM131.41 27.664L134.554 20.32L137.722 27.664H131.41ZM152.65 21.04C150.898 21.04 149.41 21.64 148.402 22.864V21.184H145.546V38.656H148.546V32.44C149.578 33.616 151.018 34.168 152.65 34.168C156.394 34.168 159.154 31.576 159.154 27.592C159.154 23.632 156.394 21.04 152.65 21.04ZM152.314 31.6C150.154 31.6 148.498 30.04 148.498 27.592C148.498 25.144 150.154 23.584 152.314 23.584C154.474 23.584 156.106 25.144 156.106 27.592C156.106 30.04 154.474 31.6 152.314 31.6ZM169.103 21.04C167.351 21.04 165.863 21.64 164.855 22.864V21.184H161.999V38.656H164.999V32.44C166.031 33.616 167.471 34.168 169.103 34.168C172.847 34.168 175.607 31.576 175.607 27.592C175.607 23.632 172.847 21.04 169.103 21.04ZM168.767 31.6C166.607 31.6 164.951 30.04 164.951 27.592C164.951 25.144 166.607 23.584 168.767 23.584C170.927 23.584 172.559 25.144 172.559 27.592C172.559 30.04 170.927 31.6 168.767 31.6Z" fill="#404AA3"/>
            </svg>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item {{(request()->is('login') ? 'active' : '')}}">
                        <a class="nav-link {{ (request()->is('login') ? 'active' : '')}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item {{(request()->is('register') ? 'active' : '')}}">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item {{(request()->is('admin/dashboard*') ? 'active' : '')}}">
                        <a href="{{ url('admin/dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item {{(request()->is('admin/perusahaan*') ? 'active' : '')}}">
                        <a href="{{ url('admin/perusahaan') }}" class="nav-link">Perusahaan</a>
                    </li>
                    <li class="nav-item {{(request()->is('admin/karyawan*') ? 'active' : '')}}">
                        <a href="{{ url('admin/karyawan') }}" class="nav-link">Karyawan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             <i class="fa fa-fw fa-sign-out mr-2"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
