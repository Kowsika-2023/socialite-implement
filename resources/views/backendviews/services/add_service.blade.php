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
                    Services<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Add Service</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a style="color:black" href="{{ route('services.index') }}">Services</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header">

                <h3 class="block-title ">Add Service</h3>


            </div>
            <div class="block-content block-content-full">

                <form action="{{ route('services.store') }}" method="POST">
                    @csrf
                    @method('post')

                    <div class="form-outline mb-4 col-8">
              <label>Name</label>
                <input type="text"   name="name"  maxlength="255" minlength="3" required  value="{{ old('name') }}" class="form-control form-control-lg"
                  placeholder="Enter Name" />  
              </div> @error('name')
                      <span class="text text-danger">{{ $message }}</span>
                  @enderror
    

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

                    <!-- Content input -->
                    <div class="form-outline mb-4 col-8">
                        <label for="description">Description</label>
                        <p>The description must not be greater than 255 characters.</p>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter description" maxlength="255" required rows="4" cols="50">{!! old('description') !!}
                        </textarea>
                    @error('description')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="form-group pt-2">
                        <a href="{{ Route('services.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
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
                img.style.cssText = "width:70px;height:70px;margin: 2rem;";
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
