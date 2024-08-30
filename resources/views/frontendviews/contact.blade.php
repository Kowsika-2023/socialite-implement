@extends('frontendviews.templates.app')
@section('content')
@extends('frontendviews.templates.navbar')
<div class="abou-pages  ">
    <h3>Contact US</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, earum aliquid quos quisquam </p>
</div>
<!-- contact start -->
<div class="my-4 cont-us w-90 d-flex-wrap">
    <div class="col-md-6 col-12 ">
        <div class="cont-img">
            <img src="{{asset('assets/img/contact.png')}}" alt="">
            <div class="con_txt">
                <h2>Get in touch</h2>
                <div class="con_tit d-flex align-items-center my-3">
                    <i class="fa-solid fa-location-dot  pe-2"></i>
                    <h5>Address</h5>
                </div>
                <p>Plot. no. 6, Palm beach, Ansari nagar, Kovalam ,603110.</p>

                <div class="con_tit d-flex align-items-center my-3">
                    <i class="fa-solid fa-phone  pe-2 "></i>
                    <h5>Phone</h5>
                </div>
                <p><a href="tel:+91 70106 18462">+91 70106 18462</a></p>

                <div class="con_tit d-flex align-items-center my-3">
                    <i class="fa-solid fa-envelope  pe-2"></i>
                    <h5>Mail</h5>
                </div>
                <p><a href="mailto:demo@gmail.com">demo@gmail.com</a></p>
            </div>
        </div>

    </div>
    <div class="col-md-6 col-12 ">
        <div class="cont-box  ">
            <div class="  job-form">
                <h4>Enquiry Now</h4>
                <form action="{{route('frontendviews.mail.id')}}" id = "loaderfrm" method="post">
                    @csrf
                    @method('POST')
                    <div class="my-3 px-3">
                        <label for="name">Name</label>
                        <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" required placeholder="Enter Name" name="name" />
                    </div>
                    @error('name')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                    <div class="my-3 px-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" class="form-control"  required placeholder="Enter Email" name="email" />
                    </div>
                    @error('email')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                    <div class="my-3 px-3">
                        <label for="">Phone</label>
                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" maxlength="10" pattern="[6789][0-9]{9}" required placeholder="Enter Phone Number" name="mobile" pattern="[6-9]{1}[0-9]{9}" minlength="10" return false; />

                    </div>
                    @error('mobile')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror

                    <div class="my-3 px-3">
                        <label for="subject">Subject</label>
                        <input type="subject" class="form-control @error('subject') is-invalid @enderror" id="subject" required placeholder="Enter Subject" name="subject" />
                    </div>
                    @error('subject')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror

                    <div class="my-3 px-3">
                        <label for="message">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" placeholder="type here..." required name="message" rows="4" id="message"></textarea>
                    </div>
                    @error('message')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                    <div class="sub_mit my-3 px-2">
                            <button type="submit" value="submit" class="btn-des">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- contact end -->
@endsection