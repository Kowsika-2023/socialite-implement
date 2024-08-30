@extends('backendviews.layouts.app')
@section('content')
@if(Auth::check())
@include('backendviews.layouts.navbar')
@include('backendviews.layouts.sidebar')
@endif
<style>
    .gradientBRD{
        background: -webkit-linear-gradient(left, #4e298f, #9466d5, #7a28df);
      background: linear-gradient(left, #5e298f, #4b376f, #7d28df);

  }
  </style>
    <main id="main-container">
    <!-- Page Content -->
    <div class="hero-static d-flex align-items-center  ">
     <div class="w-100  ">
         <!-- Sign In Section -->
         <div class="bg-white  ">
             <div class="content content-full p-5 gradientBRD">
                 <div class="row justify-content-center p-2">
                     <div class="col-md-8 col-lg-6 col-xl-4 py-4 pt-5 pb-5">
                         <!-- Header -->
                         <div class="text-center">
                             <p class="mb-2">

                             </p>
                             <img src="{{ asset('assets/img/logo.png') }}" width="150" alt="Log">

                         </div>
                         <!-- END Header -->

                         <!-- Sign In Form -->
                         <form  action="{{ route('check.credentials') }}" method="POST">
                             @csrf
                             @method('post')
                             <div class="py-3">
                                 <div class="form-group">
                                     <input type="text" class="@error('user_name') is-invalid @enderror  form-control form-control-lg form-control-alt" value="{{ old('user_name') }}"  name="user_name" placeholder="User Name" required>
                                     @error('user_name')
                                        <span class="text text-danger">{{ $message }}*</span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                     <input type="password" class="  @error('password') is-invalid @enderror  form-control form-control-lg form-control-alt" value="{{ old('password') }}"  name="password" placeholder="Password" required>
                                     @error('password')
                                     <span class="text text-danger">{{ $message }}*</span>
                                 @enderror
                                 </div>


                                 <div class="form-group">
                                     <div class="d-md-flex align-items-md-center justify-content-md-between">
                                         <div class="custom-control custom-switch">
                                             <input type="checkbox" class="custom-control-input" id="login-remember" name="remember">
                                             <label class="custom-control-label font-w400" for="login-remember">Remember Me</label>
                                         </div>
                                         <div class="py-2 ">
                                         </div>
                                     </div>
                                 </div>

                             </div>
                             <div class="form-group row justify-content-center mb-0">
                                 <div class="col-md-6 col-xl-5">
                                   <button type="submit" class="btn btn-rounded btn-success pl-5 pr-5">
                                         <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                     </button>
                                 </div>
                             </div>

                            </br>
                             <div class="form-group row justify-content-center mb-0">
                                 <div class="col-md-6 col-xl-5">
                                   <a href="{{route('google.auth')}}" class="btn btn-rounded btn-success pl-5 pr-5">Continue With Google</a>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
    </main>
@endsection
