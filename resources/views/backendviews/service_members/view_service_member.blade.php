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
                  Service Members<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
              </h1>
              <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-alt">
                      <li class="breadcrumb-item">View Service Members</li>
                      <li class="breadcrumb-item" aria-current="page">
                          <a style="color:black"href="{{ route('members.index') }}">Service Member</a>
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
        
           <h3 class="block-title ">View Service Member</h3>
        
         
      </div> 
       <div class="block-content block-content-full">
  
          <form action="{{ route('members.show',$service_member->id) }}" method="POST" >
              @csrf
              
              <div class="form-outline mb-4 col-8">
    
    <label for="service_member">Service</label>
        <input type="text"   name="service_id" readonly  value="{{ $service_member->service?$service_member->service->name:'-' }}" class="form-control form-control-lg"/>  

    </div>


<!--USER Name input -->
<div class="form-outline mb-4 col-8">
<label>Name</label>
<input type="text"   name="name" minlength="3" maxlength="255"  readonly  value="{{ $service_member->name }}" class="form-control form-control-lg"
 />
</div> 
@error('name')
<span class="text text-danger">{{ $message }}</span>
@enderror

<div class="form-outline mb-4 col-8">
<label>Title</label>
<input type="text"   name="title"  readonly value="{{ $service_member->title }}" class="form-control form-control-lg"
 />
</div> 
@error('title')
<span class="text text-danger">{{ $message }}</span>
@enderror



<!-- Content input -->
<div class="form-outline mb-4 col-8">
<label for="description">description</label>
<textarea class="form-control @error('description') is-invalid @enderror" readonly name="description" required rows="4" cols="50">{!! value($service_member->description) !!}
 </textarea>
</div>
@error('description')
<span class="alert alert-danger">{{ $message }}</span>
@enderror
</div>
         

<!-- Image input -->
                    <div class="form-group col-8">
                                <label for="sub_heading">Image</label>
                                <div class="mb-4">
                                    <div class="row gutters-tiny items-push js-gallery push">
                                        <div class="animated fadeIn">
                                            <div class="options-container fx-item-rotate-r">
                                                <img src="{{ asset('images/service_members/'.$service_member->image) }}" readonly alt="your image" width="551px" height="368px" />
                                                <div class="options-overlay bg-black-75">
                                                    <div class="options-overlay-content">
                                                        <a class="btn btn-sm btn-primary img-lightbox" href="{{ asset('images/service_members/'.$service_member->image) }}" >
                                                            <i class="fa fa-search-plus mr-1"></i> View
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-outline mb-4 col-8">
              <label>YOE</label>
              <input type="text" name="yoe"  value="{{ $service_member->yoe}}" readonly class="form-control form-control-lg"
                />
            </div>
                @error('yoe')
                <span class="text text-danger">{{ $message }}</span>
            @enderror

            
            <div class="form-outline mb-4 col-8">
              <label>Mobile</label>
              <input type="text" maxlength="10" pattern="[6789][0-9]{9}"  readonly name="mobile"   value="{{ $service_member->mobile}}" class="form-control form-control-lg"
               />
            </div>
             @error('mobile')
                <span class="text text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group pt-2">
              <a href="{{ Route('members.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
              
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
  aspectRatio: 0.86/1,
  crop: function(e) {
  }
  });
  if (cropper.element.classList.contains("cropper-hidden"))
      {
          cropper.element.cropper.destroy();
          var cropper = new Cropper(image, {
              aspectRatio: 0.86/1,
              crop: function(e) {}
          });
      }
  document.getElementById('crop_button').addEventListener('click', function(){
  var imgurl =  cropper.getCroppedCanvas().toDataURL();
  var img = document.createElement("img");
  img.src = imgurl;
  img.style.cssText = "width:612px;height:709px;margin: 2rem;";
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