@extends('backendviews.layouts.app')
@section('content')
@if(Auth::check())
@include('backendviews.layouts.navbar')
@include('backendviews.layouts.sidebar')
@endif
  <main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light ">
      <div class="content content-full">
          <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
              <h1 class="flex-sm-fill h3 my-2">
                  Admins<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
              </h1>
              <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-alt">
                      <li class="breadcrumb-item">Edit Admin</li>
                      <li class="breadcrumb-item" aria-current="page">
                        <a style="color:black" href="{{ route('admins.index') }}">Admins</a>
                      </li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <!-- END Hero -->
 <!-- END Hero -->
 <div class="content">
  <div class="block block-rounded">
    <div class="block-header">
        
           <h3 class="block-title ">Edit Admin</h3>
        
         
      </div> 
       <div class="block-content block-content-full">
  
          <form action="{{ route('admins.update',$admin->id) }}" method="POST" >
              @csrf
              @method('put')
              
          <!--USER Name input -->
          <div class="form-outline mb-4 col-8">
            <label>Name</label>
              <input type="text"   name="name" minlength="3" maxlength="255"    value="{{ $admin->name }}" class="form-control form-control-lg"
                placeholder="Enter Name" />
            </div> @error('name')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror

        <!-- NAME -->
        <div class="form-outline mb-4 col-8">
            <label>User Name</label>
              <input type="text"   name="user_name"  maxlength="255"  minlength="3"  value="{{ $admin->user_name }}" class="form-control form-control-lg"
                placeholder="Enter User Name" />
            </div> @error('user_name')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror

       <!-- mobile input -->
       <div class="form-outline mb-4 col-8">
              <label>Mobile</label>
              <input type="text" maxlength="10" pattern="[6789][0-9]{9}"   name="mobile"   value="{{ $admin->mobile}}" class="form-control form-control-lg"
                placeholder="Enter a Mobile Number" />
            </div>
             @error('mobile')
                <span class="text text-danger">{{ $message }}</span>
            @enderror

          <!-- Email input -->
          <div class="form-outline mb-4 col-8">
            <label>Email</label>
            <input type="email" maxlength="255"  pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email"  value="{{ $admin->email}}" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
          </div> @error('email')
              <span class="text text-danger">{{ $message }}</span>
          @enderror

           

             <!-- Password input -->
          <div class="form-outline mb-3 col-8">
            <label>Password</label>
              <input type="password"  name="password" maxlength="15" id="password1" placeholder="Password" class="form-control form-control-lg"/> 
              <span toggle="#password-field"  onclick="myPassword()" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
            </div>
            @error('password')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
             
               
        <div class="form-outline mb-3 col-8">
              <label>Confirm Password</label>
                <input type="password"   name="confirm_password"   id="password2"   maxlength="15"  class="form-control form-control-lg"
                  placeholder="Confirm Password">  
                  <span toggle="#password-field"  onclick="myConfirmPassword()" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>

                </div>
                   
                  @error('confirm_password')
                  <span class="text text-danger">{{ $message }}</span>
              @enderror
            

            <div class="form-group pt-2">
              <a href="{{ Route('admins.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>

       </form>
       </div>


          <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
      </div></div>
      </div>
   
  </main>

@endsection
@section('script')
<script>
function myPassword() {
  var x = document.getElementById("password1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection