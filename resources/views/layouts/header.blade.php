<header id="header" class="header-v3">
    <nav class="flat-mega-menu">
        <label for="mobile-button"> <i class="fa fa-bars"></i></label>
        <input id="mobile-button" type="checkbox">

        <ul class="collapse">
            <li class="title d-flex align-items-center">
                <a href="{{ route('home') }}" target="_blank"><img style="max-width: 40px"
                        src="https://i.postimg.cc/QCyRWB1P/IMG-20220826-172957-743-removebg-preview.png"
                        alt="IMG-20220826-172957-743-removebg-preview" /></a>
            </li>
            <li><a href="{{ route('service.categories') }}">Service Categories</a></li>
            <li> <a href="javascript:void(0);">Air Conditioners</a>
                <ul class="drop-down one-column hover-fade">
                    <li><a href="service-details/ac-wet-servicing.html">Wet Servicing</a></li>
                    <li><a href="service-details/ac-dry-servicing.html">Dry Servicing</a></li>
                    <li><a href="service-details/ac-installation.html">Installation</a></li>
                    <li><a href="service-details/ac-uninstallation.html">Uninstallation</a></li>
                    <li><a href="service-details/ac-gas-top-up.html">Gas Top Up</a></li>
                    <li><a href="service-details/ac-gas-refill.html">Gas Refill</a></li>
                    <li><a href="service-details/ac-repair.html">Repair</a></li>
                </ul>
            </li>
            <li> <a href="#">Appliances</a>
                <ul class="drop-down one-column hover-fade">
                    <li><a href="servicesbycategory/11.html">Computer Repair</a></li>
                    <li><a href="servicesbycategory/12.html">TV</a></li>
                    <li><a href="servicesbycategory/1.html">AC</a></li>
                    <li><a href="servicesbycategory/14.html">Geyser</a></li>
                    <li><a href="servicesbycategory/21.html">Washing Machine</a></li>
                    <li><a href="servicesbycategory/22.html">Microwave Oven</a></li>
                    <li><a href="servicesbycategory/9.html">Chimney and Hob</a></li>
                    <li><a href="servicesbycategory/10.html">Water Purifier</a></li>
                    <li><a href="servicesbycategory/13.html">Refrigerator</a></li>
                </ul>
            </li>
            <li> <a href="#">Home Needs</a>
                <ul class="drop-down one-column hover-fade">
                    <li><a href="servicesbycategory/19.html">Laundry</a></li>
                    <li><a href="servicesbycategory/4.html">Electrical</a></li>
                    <li><a href="servicesbycategory/8.html">Pest Control</a></li>
                    <li><a href="servicesbycategory/7.html">Carpentry</a></li>
                    <li><a href="servicesbycategory/3.html">Plumbing </a></li>
                    <li><a href="servicesbycategory/20.html">Painting</a></li>
                    <li><a href="servicesbycategory/17.html">Movers &amp; Packers</a></li>
                    <li><a href="servicesbycategory/5.html">Shower Filters </a></li>
                </ul>
            </li>
            <li> <a href="#">Home Cleaning</a>
                <ul class="drop-down one-column hover-fade">
                    <li><a href="service-details/bedroom-deep-cleaning.html">Bedroom Deep Cleaning</a></li>
                    <li><a href="service-details/overhead-water-storage.html">Overhead Water Storage </a></li>
                    <li><a href="/service-details/tank-cleaning">Tank Cleaning</a></li>
                    <li><a href="service-details/underground-sump-cleaning.html">Underground Sump Cleaning</a>
                    </li>
                    <li><a href="service-details/dining-chair-shampooing.html">Dining Chair Shampooing </a>
                    </li>
                    <li><a href="service-details/office-chair-shampooing.html">Office Chair Shampooing</a></li>
                    <li><a href="service-details/home-deep-cleaning.html">Home Deep Cleaning </a></li>
                    <li><a href="service-details/carpet-shampooing.html">Carpet Shampooing </a></li>
                    <li><a href="service-details/fabric-sofa-shampooing.html">Fabric Sofa Shampooing</a></li>
                    <li><a href="service-details/bathroom-deep-cleaning.html">Bathroom Deep Cleaning</a></li>
                    <li><a href="service-details/floor-scrubbing-polishing.html">Floor Scrubbing &amp;
                            Polishing
                        </a></li>
                    <li><a href="service-details/mattress-shampooing.html">Mattress Shampooing </a></li>
                    <li><a href="service-details/kitchen-deep-cleaning.html">Kitchen Deep Cleaning </a></li>
                </ul>
            </li>
            <li> <a href="#">Special Services</a>
                <ul class="drop-down one-column hover-fade">
                    <li><a href="servicesbycategory/16.html">Document Services</a></li>
                    <li><a href="servicesbycategory/15.html">Cars &amp; Bikes</a></li>
                    <li><a href="servicesbycategory/17.html">Movers &amp; Packers </a></li>
                    <li><a href="servicesbycategory/18.html">Home Automation</a></li>
                </ul>
            </li>
            @if (Route::has('login'))
                @auth()
                    @if (auth()->user()->uType === 'admin')
                        <li class="login-form">
                            <a href="{{ route('login') }}" title="Login">My Account (Admin)</a>
                            <ul class="drop-down one-column hover-fade">
                                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('admin.service.categories') }}">Service Categories</a></li>
                                <li><a href="{{ route('admin.services.index') }}">Services</a></li>
                                <li><a href="{{ route('admin.slider.index') }}">Manage Slider</a></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @elseif (auth()->user()->uType === 'survice_provider')
                        <li class="login-form">
                            <a href="{{ route('login') }}" title="Login">My Account (Service Provider)</a>
                            <ul class="drop-down one-column hover-fade">
                                <li><a href="{{ route('servicer-provider.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="login-form">
                            <a href="{{ route('login') }}" title="Login">My Account (Customer)</a>
                            <ul class="drop-down one-column hover-fade">
                                <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none">
                        @csrf
                    </form>
                @else
                    <li class="login-form"> <a href="{{ route('register') }}" title="Register">Register</a></li>
                    <li class="login-form"> <a href="{{ route('login') }}" title="Login">Login</a></li>
                @endauth
            @endif
            <li class="search-bar">
            </li>
        </ul>
    </nav>
</header>
