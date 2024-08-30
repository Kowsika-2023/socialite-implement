<div>
    {{-- Do your work, then step back. --}}
    @extends('frontendviews.templates.app')
@section('content')
@extends('frontendviews.templates.navbar')
<!-- banner -->
    <div class="bane_design">
        <div id="demo" class="carousel slide my-3 carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">
             <div class="carousel-inner">
                        @foreach ($banners as $key => $banner )
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <div class="d-flex-al w-90">
                        <div class="col-md-6 col-12 px-3 my-2">
                           <div class="banner-conten">
                               <div class="d-flex-al">
                                    <span class="material-symbols-outlined">
                                        maximize
                                    </span>
                                      <h6>Happy Employee</h6>
                                </div>
                                  <h1>We provider Your Business
                                    <span>Support</span>
                                  </h1>

                                  <p>{!! $banner->content !!}</p>
                                    <div>
                                       <a href="{{route('frontendviews.services')}}" class="btn-des btn">Our Services</a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 px-3 my-2">
                            <div class="bane_img">
                                <img src="{{asset('images/banners/'.$banner->image)}}" class="ban-desimg">
                                <img src="{{asset('assets/img/geometric.png')}}" class="geo-desimg">
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach


        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <!-- <span class="carousel-control-prev-icon"></span> -->
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <!-- <span class="carousel-control-next-icon"></span> -->
        </button>
        </div>
    </div>
   </div>
<!-- banner end -->
<!-- about us -->
<div class="mt-3 my-md-0 my-3 d-flex-al w-90 ab-session">
    <div class="col-md-6 col-12 px-3 my-md-0 my-2">
        <img src="{{asset('assets/img/about.png')}}" alt="">
    </div>
    <div class="col-md-6 col-12 px-3   my-2">
        <div class="abot-conten">
            <div class="d-flex-al">
                <span class="material-symbols-outlined">
                    maximize
                </span>
                <h6>About Us</h6>
            </div>
            <h2>Find Your Dream Job
                With Comfort
            </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita delectus suscipit omnis sit maiores,
                facilis totam. Voluptatum quos sequi tenetur dicta nulla? Pariatur accusantium fugiat deleniti
                aspernatur officia animi qui.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita delectus suscipit omnis sit maiores,
                facilis totam. Voluptatum quos sequi tenetur dicta nulla? Pariatur accusantium fugiat deleniti
                aspernatur officia animi qui.</p>
            <div>
                <a href="{{route('frontendviews.about')}}" class="btn-des btn">Read more</a>

            </div>
        </div>
    </div>
</div>
<!-- about us end -->
<!-- our services -->
<div class="our-service">
    <div class="abot-conten">
        <div class="d-flex-al-jc">
            <span class="material-symbols-outlined">
                maximize
            </span>
            <h6>Our Services</h6>
        </div>
        <h2>Everything You Need. All Right Here.
        </h2>
    </div>
    <div class="owl-carousel owl-theme owl_service w-90">
    @foreach($services as $service)
        <div class="item">
            <a href="{{route('frontendviews.service.details',[$service->slug_name])}}">
                <div class="owl-box">
                    <div class="cir-img">
                        <img src="{{asset('images/services/'.$service->image)}}" alt="" />
                    </div>
                    <div class="my-2 service-con">
                        <h5>{{ $service->name}}</h5>
                           <p>{!! $service->description !!}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach


    </div>
</div>
<!-- our services end -->
<!-- features -->
<div class="my-3 d-flex-al w-90 feat-res">
    <div class=" col-lg-5 col-12 px-3 my-2">
        <div class="abot-conten">
            <div class="d-flex-al">
                <span class="material-symbols-outlined">
                    maximize
                </span>
                <h6>Special Features</h6>
            </div>
            <h2>Bridge for industrial &
                corporate development.
            </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quaerat voluptas magni in ratione
                quibusdam beatae minima inventore deleniti iure et, vitae dolore sed! Quisquam molestias cum ducimus
                esse culpa!</p>
        </div>
        <div class="faq_des">
            <div class="accordion-items">
                <button class="accordion">
                    <img src="{{asset('assets/img/play.png')}}" alt="">
                    Best Hiring Agency</button>
                <div class="panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="accordion-items">
                <button class="accordion">
                    <img src="{{asset('assets/img/play.png')}}" alt="">
                    Quality Opportunities</button>
                <div class="panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="accordion-items">
                <button class="accordion">
                    <img src="{{asset('assets/img/play.png')}}" alt="">
                    Career Coaching</button>
                <div class="panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-lg-7 col-12 px-3 my-2">
        <div class="d-flex-wrap">
            <div class="my-2 px-3 col-md-6 col-12 ">
                <div class="fet-box">
                    <div class="icon-box my-2">
                        <img src="{{asset('assets/img/f1.png')}}" alt="">
                    </div>
                    <h5>Fast Recognition</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti aliquid fuga accusantium ea
                        ratione laboriosam sapiente neque optio necessitatibus, doloribus ipsum nam numquam harum
                        deleniti maxime quidem perspiciatis, distinctio modi.
                    </p>
                </div>
            </div>
            <div class="my-2 px-3 col-md-6 col-12 ">
                <div class="fet-box">
                    <div class="icon-box my-2">
                        <img src="{{asset('assets/img/f2.png')}}" alt="">
                    </div>
                    <h5>Job For Everyone</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti aliquid fuga accusantium ea
                        ratione laboriosam sapiente neque optio necessitatibus, doloribus ipsum nam numquam harum
                        deleniti maxime quidem perspiciatis, distinctio modi.
                    </p>
                </div>
            </div>
            <div class="my-2 px-3 col-md-6 col-12 ">
                <div class="fet-box">
                    <div class="icon-box my-2">
                        <img src="{{asset('assets/img/f3.png')}}" alt="">
                    </div>
                    <h5>Best Treatment to Worker</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti aliquid fuga accusantium ea
                        ratione laboriosam sapiente neque optio necessitatibus, doloribus ipsum nam numquam harum
                        deleniti maxime quidem perspiciatis, distinctio modi.
                    </p>
                </div>
            </div>
            <div class="my-2 px-3 col-md-6 col-12 ">
                <div class="fet-box">
                    <div class="icon-box my-2">
                        <img src="{{asset('assets/img/f4.png')}}" alt="">
                    </div>
                    <h5>Big Company</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti aliquid fuga accusantium ea
                        ratione laboriosam sapiente neque optio necessitatibus, doloribus ipsum nam numquam harum
                        deleniti maxime quidem perspiciatis, distinctio modi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- features end -->
<!-- enquiry -->
<div class="my-3 en-back">
    <h4>
        Join our community of talented professionals by
        <br>
        applying for a job <span>today!</span>
    </h4>
    <div class="my-3">
        <a href="" data-bs-toggle="modal" data-bs-target="#enquiry-popup" class="btn-des btn">Get in touch</a>
    </div>
</div>
<!-- enquiry end -->
@endsection
</div>
