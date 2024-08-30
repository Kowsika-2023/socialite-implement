@extends('frontendviews.templates.app')
@section('content')
@extends('frontendviews.templates.navbar')

<div class="abou-pages  ">
    <h3>About US</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, earum aliquid quos quisquam </p>
</div>
<!-- about design -->
<div class="my-3 d-flex-al w-90 abpage-con">
    <div class="my-2 col-md-6 px-3 col-12">
        <img src="{{asset('assets/img/abs.png')}}">
    </div>
    <div class="my-2 col-md-6 px-3 col-12">
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita delectus suscipit omnis sit maiores,
                facilis totam. Voluptatum quos sequi tenetur dicta nulla? Pariatur accusantium fugiat deleniti
                aspernatur officia animi qui.</p>

        </div>
    </div>
</div>
<div class="my-3 d-flex-al w-90 abpage-con">

    <div class="my-2 col-lg-6 px-3 col-12">
        <div class="abot-conten">
            <div class="d-flex-al">
                <span class="material-symbols-outlined">
                    maximize
                </span>
                <h6>OUR VALUE</h6>
            </div>
            <h2>Recruitment company work with effectiveness.
            </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita delectus suscipit omnis sit maiores,
                facilis totam.

        </div>
        <div class="my-2 our-values">
            <div class="d-flex-al">
                <div class="my-2 vis-box">
                    <img src="{{asset('assets/img/vision.png')}}" alt="">
                </div>
                <h5>Our Vision</h5>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus beatae esse repudiandae nisi dolores assumenda repellendus laborum inventore, deleniti porro nam. Vitae numquam enim odit laboriosam magnam, voluptas quas hic.</p>
        </div>
        <div class="my-2 our-values">
            <div class="d-flex-al">
                <div class="my-2 vis-box">
                    <img src="{{asset('assets/img/mission.png')}}" alt="">
                </div>
                <h5>Our Mission</h5>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus beatae esse repudiandae nisi dolores assumenda repellendus laborum inventore, deleniti porro nam. Vitae numquam enim odit laboriosam magnam, voluptas quas hic.</p>
        </div>
    </div>
    <div class="my-2 col-lg-6 px-3 col-12 ab-vales">
        <div class="d-flex-al">
            <div class="my-2 col-md-6 px-2 col-12">
                <img src="{{asset('assets/img/baner1.jpg')}}" alt="" class="ver-img">
            </div>
            <div class="my-2 col-md-6 px-2 col-12">
                <img src="{{asset('assets/img/ab.jpg')}}" alt="" class="hor-img">
                <div class="agency-box">
                    <img src="{{asset('assets/img//trophy.png')}}" alt="">
                    <h4>Best Treatment to Worker</h4>
                    <p>Ridiculus cras molestie lectus nullam ullamcorper mus</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about design end -->
@endsection