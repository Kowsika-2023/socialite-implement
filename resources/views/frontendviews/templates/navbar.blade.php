<div class="nav-menu">

    <nav class="navbar navbar-expand-md navbar-dark px-4 ">
        <a href="{{route('frontendviews.index')}}" class="navbar-brand  ">
            <img src="{{asset('assets/img/logo.png')}}" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end min-nav" id="navbarScroll">
            <ul class="navbar-nav navbar-nav-scroll nav_a">

                <li class="nav-item">
                <a class="nav-link {{  request()->is('index') ? 'active' : '' }}" aria-current="page" href="{{ route('frontendviews.index') }}">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{  request()->is('about') ? 'active' : '' }}" aria-current="page" href="{{ route('frontendviews.about') }}">About Us</a>
                </li>

                <li class="nav-item">
                <a class="nav-link {{  request()->is('service') ? 'active' : '' }}" aria-current="page" href="{{ route('frontendviews.services') }}">Services</a>

                  
                </li>
                <li class="nav-item">
                <a class="nav-link {{  request()->is('membership') ? 'active' : '' }}" aria-current="page" href="{{ route('frontendviews.membership') }}">Membership</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link {{  request()->is('contact') ? 'active' : '' }}" aria-current="page" href="{{ route('frontendviews.contact') }}">Contact us</a>

                   
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-des" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#enquiry-popup">Get Quote

                    </a>
                </li>

            </ul>

        </div>
    </nav>


</div>