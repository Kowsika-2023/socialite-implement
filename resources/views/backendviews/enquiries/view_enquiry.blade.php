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
                  Enquiries<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
              </h1>
              <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-alt">
                      <li class="breadcrumb-item">View Enquiry</li>
                      <li class="breadcrumb-item" aria-current="page">
                          <a style="color:black"href="{{ route('enquiries.index') }}">Banner</a>
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
        
           <h3 class="block-title ">View Enquiry</h3>
        
         
      </div> 
       <div class="block-content block-content-full">
  
          <form action="{{ route('enquiries.show',$enquiry->id) }}" method="GET" >
              @csrf
              
              
         
<!-- Content input -->                    
            
<div class="form-outline mb-4 col-8">
            <label>Name</label>
              <input type="text"   name="name" readonly  value="{{ $enquiry->name }}" class="form-control form-control-lg"/>
</div>
      
<div class="form-outline mb-4 col-8">
              <label>Email</label>
              <input type="email"  maxlength="255"  name="email"  readonly pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required value="{{ $enquiry->email }}" class="form-control form-control-lg"
                /> </div>
                
                <div class="form-outline mb-4 col-8">
              <label>Mobile</label>
              <input type="text" maxlength="10" pattern="[6789][0-9]{9}"   name="mobile"  readonly value="{{ $enquiry->mobile}}" class="form-control form-control-lg"
                 />
            </div>


            <div class="form-outline mb-4 col-8">
                                <label for="description">Subject</label>
                             <textarea  class="form-control @error('subject') is-invalid @enderror"  name="subject"  readonly  rows="4" cols="50" >{!! $enquiry->subject?$enquiry->subject:'-' !!}
                        </textarea>
                    </div> 
                           


                   <div class="form-outline mb-4 col-8">
                                <label for="description">Message</label>
                             <textarea  class="form-control @error('message') is-invalid @enderror"  name="message"  readonly  rows="4" cols="50" >{!! $enquiry->message !!}
                        </textarea>
                    </div> 
                            
                                  
                            
            <div class="form-group pt-2">
              <a href="{{ Route('enquiries.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
              
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