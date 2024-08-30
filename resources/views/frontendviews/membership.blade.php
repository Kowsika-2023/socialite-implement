@extends('frontendviews.templates.app')
@section('content')
@extends('frontendviews.templates.navbar')
<div class="abou-pages  ">
    <h3>Membership</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, earum aliquid quos quisquam </p>
</div>
<!--memership-->
<div class="  d-flex-wrap mem-ship">
    <div class="col-md-6 col-12 px-2 ">
        <div class="meb-bg">
            <div class="my-2">
                <img src="{{asset('assets/img/career.png')}}" alt="">
                <h3>Welcome To Day my Job</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est maxime cumque esse tempora odio quibusdam ipsum voluptate impedit. Amet vitae animi voluptas eligendi deleniti  </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-12 p-2  my-3 ">
        <div class="  job-form  w-90">
            <h4>Enquiry Now</h4>
            <form action="{{route('frontendviews.membership_mail')}}" method="post" id="loaderfrm" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="my-3 px-3">
                    <label for="name">Name</label>
                    <input type="name" class="form-control  @error('name') is-invalid @enderror" id="name" required placeholder="Enter Name" name="name" />
                </div>
                @error('name')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                <div class="my-3 px-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" class="form-control" required placeholder="Enter Email" name="email" />
                </div>
                @error('email')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                <div class="my-3 px-3">
                    <label for="mobile">Phone</label>
                    <input type="text" class="form-control  @error('mobile') is-invalid @enderror" maxlength="10" pattern="[6789][0-9]{9}" id="mobile" required placeholder="Enter Phone Number" name="mobile" return false; />

                </div>
                @error('mobile')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror

                <div class="my-3 px-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" required placeholder="Enter the Address" name="address" />

                </div>
                @error('address')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                <div class="my-3 px-3">
                    <label for="yoe">YOE</label>
                    <input type="text" class="form-control" id="yoe" required placeholder="Enter the Year of Experience" name="yoe" />

                </div>
                @error('yoe')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                <div class="my-3 px-3">
                    <label for="job_role">Job Role</label>
                    <input type="text" class="form-control  @error('job_role') is-invalid @enderror" id="job" required placeholder="Enter the Job Role" name="job_role" />

                </div>
                @error('job_role')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                <div class="my-3 px-3">
                    <label for="">Profile image</label>
                    <input type="file" class="form-control  @error('image') is-invalid @enderror" id="file" required placeholder="Enter the Job Role" name="image" />

                </div>
                @error('image')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                <div class="my-3 px-3">
                    <label for="message">Message</label>
                    <textarea class="form-control  @error('message') is-invalid @enderror" placeholder="type here..." required name="message" rows="4" id="message"></textarea>
                </div>
                @error('message')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                <div class="re_ser text-center py-2">
                    <input class="btn-des" type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
<!--memership end-->
@endsection