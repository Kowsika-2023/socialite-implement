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
                        <li class="breadcrumb-item">Add Service Member</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a style="color:black" href="{{ route('members.index') }}">Service Members</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header">

                <h3 class="block-title ">Add Service Member</h3>


            </div>
            <div class="block-content block-content-full">

                <form action="{{ route('members.store') }}" method="POST">
                    @csrf
                    @method('post')


                    <div class="form-outline mb-4 col-8">
                                <label for="video">Services</label>
                                <select name="service_id" class="form-control" id="video" required>
                                <option value="">Select a Service</option>
                                    @foreach ($services as $service )
                                    <option name="service_id" value="{{ $service->id }}">{{ $service->name }}</option> 
                                    @endforeach 
                                </select>
                            </div>


                    <!-- Name -->
                    <div class="form-outline mb-4 col-8">
              <label>Name</label>
                <input type="text"   name="name"  maxlength="255" minlength="3" required  value="{{ old('name') }}" class="form-control form-control-lg"
                  placeholder="Enter Name" />  
              </div> @error('name')
                      <span class="text text-danger">{{ $message }}</span>
                  @enderror

                  <!-- title -->
                  <div class="form-outline mb-4 col-8">
                <label>Title</label>
                 <input type="text"   name="title" required  value="{{ old('title') }}" class="form-control form-control-lg"
                  placeholder="Enter Title" />  
                  </div> 
                  @error('title')
                      <span class="text text-danger">{{ $message }}</span>
                  @enderror
    
                    <!-- Content input -->
                    <div class="form-outline mb-4 col-8">
                        <label for="content">Description</label>
                        <textarea maxlength="255" class="form-control @error('description') is-invalid @enderror" name="description" required rows="4" cols="50">{!! old('description') !!}
                        </textarea>
                    @error('description')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <!-- Image input -->
                    <div class="form-outline mb-4 col-8 ">
                        <label> Image</label>
                        <div class="custom-file">
                            <input type="file" required class="custom-file-input @error('cropped_image') is-invalid @enderror" id="image" name="image" accept="image/*" required onchange="readURL(this);">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <div class="form-outline mb-4 col-8">
                    @error('cropped_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group crop mb-5">
                        <img id="blah" src="#"  name="crop_image" alt="your image" />
                        <input name="cropped_image" type="hidden" required id="cropped_image" />
                        <div id="cropped_result"></div>
                        <button type="button" id="crop_button" class="mt-5 mb-5 btn btn-primary">Crop</button>
                        <button type="button" id="reset" class="mt-5 mb-5 btn btn-danger">Reset</button>
                    </div>


                    <div class="form-outline mb-4 col-8">
              <label>YOE</label>
              <input type="text" name="yoe"  required value="{{ old('yoe')}}" class="form-control form-control-lg"
                placeholder="Enter Years Of Experience" />
            </div>
                @error('yoe')
                <span class="text text-danger">{{ $message }}</span>
            @enderror


            
            <div class="form-outline mb-4 col-8">
              <label>Mobile</label>
              <input type="text" maxlength="10" pattern="[6789][0-9]{9}"   name="mobile"  required value="{{ old('mobile')}}" class="form-control form-control-lg"
                placeholder="Enter a valid mobile number" />
            </div>
                @error('mobile')
                <span class="text text-danger">{{ $message }}</span>
            @enderror




                    <div class="form-group pt-2">
                        <a href="{{ Route('members.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    @endsection
    @section('script')
    <script>
        $('.crop').hide();
        $('#reset').hide();

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.crop').show();
                    $('#blah').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
                setTimeout(initCropper, 1000);
            }
        }

        function initCropper() {
            var image = document.getElementById('blah');
            var cropper = new Cropper(image, {
                aspectRatio:    1/1,
                crop: function(e) {}
            });
            if (cropper.element.classList.contains("cropper-hidden")) {
                cropper.element.cropper.destroy();
                var cropper = new Cropper(image, {
                    aspectRatio:    1/1,
                    crop: function(e) {}
                });
            }
            document.getElementById('crop_button').addEventListener('click', function() {
                var imgurl = cropper.getCroppedCanvas().toDataURL();
                var img = document.createElement("img");
                img.src = imgurl;
                img.style.cssText = "width:140px;height:140px;margin: 2rem;";
                document.getElementById("cropped_result").appendChild(img);
                $('#cropped_image').val(imgurl);
                $('#reset').show();
                $('#crop_button').hide();

                document.getElementById('reset').addEventListener('click', function() {
                    document.getElementById("cropped_result").appendChild(img).remove();
                    $('#reset').hide();
                    $('#crop_button').show();
                });
            });
        }
    </script>
</main>
@endsection