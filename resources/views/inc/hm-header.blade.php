<header class="navbar-top">
    <div class="container">
        <div class="row vy-middle nav-wrapper">
            <div class="col brand-cont">
                <div class="brand">
                    <a href="{{ route('main') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="" />
                    </a>
                </div>
                <div class="menu-nav-toggle">
                    <span aria-readonly="true"></span>
                    <span aria-readonly="true"></span>
                    <span aria-readonly="true"></span>
                </div>
            </div>
            <div class="col-12 col-md nav-container">
                <form method="GET" action="{{ route('search') }}" class="search-container">
                    <a class="dismiss" href="#">
                        <i class="fas fa-times"></i>
                    </a>
                    <input type="text" placeholder="Search" name="q">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <nav class="nav-menu">
                    <ul class="top-menu">
                        <li>
                            <a href="{{ route('main') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('shop') }}">Shop</a>
                            {{-- <ul class="dropdown">
                                <li>
                                    <a>Florals</a>
                                    <i class="fas fa-chevron-right"></i>
                                    <ul class="dropdown">
                                        <li>
                                            <a href="{{ route('florals') }}">Flower Boxes</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('luxury-box') }}">Luxury Rose Boxes</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('spec-occas') }}">Special Occasions</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('chocolates') }}">Chocolates</a>
                                </li>
                                <li>
                                    <a href="{{ route('hampers') }}">Hampers</a>
                                </li>
                                <li>
                                    <a href="{{ route('cakes') }}">Cakes</a>
                                </li>
                            </ul> --}}
                        </li>
                        <li>
                            <a href="{{ route('about') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('events') }}">Events</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </nav>
                <ul class="cart-menu">
                    <li>
                        <a class="search-collapse" href="#">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</header>