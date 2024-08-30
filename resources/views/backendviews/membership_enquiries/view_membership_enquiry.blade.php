@extends('backendviews.layouts.app')
@section('content')
@include('backendviews.layouts.navbar')
@include('backendviews.layouts.sidebar')
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light ">
      <div class="content content-full">
          <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
              <h1 class="flex-sm-fill h3 my-2">
                View Membership Enquiry<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
              </h1>
              <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-alt">
                      <li class="breadcrumb-item">View Membership Enquiry</li>
                      <li class="breadcrumb-item" aria-current="page">
                          <a style="color:black"href="{{ route('membership_enquiries.index') }}">Membership Enquiry</a>
                      </li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <!-- END Hero -->
  <div class="content">
  <div class="block block-rounded">
      <div class="block-header">
        
           <h3 class="block-title ">View Membership Enquiry</h3>
        
         
      </div> 
       <div class="block-content block-content-full">
  
          <form action="{{ route('membership_enquiries.show',$membership_enquiry->id) }}" method="POST" >
              @csrf
              
              
         
<!-- Content input -->                    
            
<div class="form-outline mb-4 col-8">
            <label>Name</label>
              <input type="text"   name="name" readonly  value="{{ $membership_enquiry->name }}" class="form-control form-control-lg"/>
</div>
      
<div class="form-outline mb-4 col-8">
              <label>Email</label>
              <input type="email"  maxlength="255"  name="email"  readonly pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required value="{{ $membership_enquiry->email }}" class="form-control form-control-lg"
                /> </div>
                
                <div class="form-outline mb-4 col-8">
              <label>Mobile</label>
              <input type="text" maxlength="10" pattern="[6789][0-9]{9}"   name="mobile"  readonly value="{{ $membership_enquiry->mobile}}" class="form-control form-control-lg"
                 />
            </div>

            <div class="form-outline mb-4 col-8">
            <label>Years of Experience</label>
              <input type="text"   name="name" readonly  value="{{ $membership_enquiry->yoe }}" class="form-control form-control-lg"/>

            </div><div class="form-outline mb-4 col-8">
            <label>Job Role</label>
              <input type="text"   name="name" readonly  value="{{ $membership_enquiry->job_role }}" class="form-control form-control-lg"/>
            </div>

                    <div class="form-outline mb-4 col-8">
                                <label for="description">Adderss</label>
                             <textarea  class="form-control @error('address') is-invalid @enderror"  name="message"  readonly  rows="4" cols="50" >{{$membership_enquiry->address}}
                        </textarea>
                    </div> 
                           <div class="form-outline mb-4 col-8">
                                <label for="description">Message</label>
                             <textarea  class="form-control @error('message') is-invalid @enderror"  name="message"  readonly  rows="4" cols="50" >{!! $membership_enquiry->message !!}
                        </textarea>
                    </div> 
                            
                    <div class="form-group col-8">
                                <label for="sub_heading">Image</label>
                                <div class="mb-4">
                                    <div class="row gutters-tiny items-push js-gallery push">
                                        <div class="animated fadeIn">
                                            <div class="options-container fx-item-rotate-r">
                                                <img src="{{ asset('images/membership_enquiries/'.$membership_enquiry->image) }}" readonly alt="your image" width="551px" height="368px" />
                                                <div class="options-overlay bg-black-75">
                                                    <div class="options-overlay-content">
                                                        <a class="btn btn-sm btn-primary img-lightbox" href="{{ asset('images/membership_enquiries/'.$membership_enquiry->image) }}" >
                                                            <i class="fa fa-search-plus mr-1"></i> View
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                                       
                            
            <div class="form-group pt-2">
              <a href="{{ Route('membership_enquiries.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
              
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
  $('.crop').hide();
  $('#reset').hide();
  function readURL(input) {
  if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
      $('.crop').show();
  $('#blah').attr('src', e.target.result)
  };
  reader.readAsDataURL(input.files[0]);
  setTimeout(initCropper, 1000);
  }
  }
  function initCropper(){
  var image = document.getElementById('blah');
  var cropper = new Cropper(image, {
  aspectRatio: 1.27/1,
  crop: function(e) {
  }
  });
  if (cropper.element.classList.contains("cropper-hidden"))
      {
          cropper.element.cropper.destroy();
          var cropper = new Cropper(image, {
              aspectRatio: 1.27/1,
              crop: function(e) {}
          });
      }
  document.getElementById('crop_button').addEventListener('click', function(){
  var imgurl =  cropper.getCroppedCanvas().toDataURL();
  var img = document.createElement("img");
  img.src = imgurl;
  img.style.cssText = "width:300px;height:227px;margin: 2rem;";
  document.getElementById("cropped_result").appendChild(img);
  $('#cropped_image').val(imgurl);
  $('#reset').show();
  $('#crop_button').hide();
  
  document.getElementById('reset').addEventListener('click', function(){
      document.getElementById("cropped_result").appendChild(img).remove();
      $('#reset').hide();
      $('#crop_button').show();
  });
  
  });
  
  }
 </script>
@endsection