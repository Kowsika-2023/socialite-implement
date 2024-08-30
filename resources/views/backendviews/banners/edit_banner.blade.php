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
                    Banners<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Edit Banner</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a style="color:black" href="{{ route('banners.index') }}">Banner</a>
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

                <h3 class="block-title ">Edit Banner</h3>


            </div>

                <form action="{{ Route('banners.update',[$banner->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <!-- Content input -->
                    <div class="form-outline mb-4 col-8">
                        <label for="description">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" required rows="4" cols="50">{!! value($banner->content) !!}
                             </textarea>
                    </div>
                    <div class="form-outline mb-4 col-8">

                        @error('content')
                         <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                <div class="form-outline mb-4 col-8">
                    <div class="form-group col-8">
                        <label for="sub_heading"> Banner Image</label>
                        <div class="mb-4">
                            <div class="row gutters-tiny items-push js-gallery push">
                                <div class="animated fadeIn">
                                    <div class="options-container fx-item-rotate-r">
                                        <img src="{{ asset('images/banners/'.$banner->image) }}" alt="your image" width="551px" height="368px" />
                                        <div class="options-overlay bg-black-75">
                                            <div class="options-overlay-content">
                                                <a class="btn btn-sm btn-primary img-lightbox" href="{{ asset('images/banners/'.$banner->image) }}">
                                                    <i class="fa fa-search-plus mr-1"></i> View
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-8" id="newRow"></div>
                    <div class="form-group col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('cropped_image') is-invalid @enderror" id="image" name="image" accept="image/*" onchange="readURL(this);">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    @error('cropped_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group crop mb-5 col-8">
                        <img id="blah" src="#"  name="crop_image" alt="your image" />
                        <input name="cropped_image" type="hidden" id="cropped_image" />
                        <div id="cropped_result"></div>
                        <button type="button" id="crop_button" class="mt-5 mb-5 btn btn-primary">Crop</button>
                        <button type="button" id="reset" class="mt-5 mb-5 btn btn-danger">Reset</button>
                    </div>

                    <div class="form-group">
                        <a href="{{ Route('banners.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
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
            aspectRatio:    0.86/1,
            crop: function(e) {}
        });
        if (cropper.element.classList.contains("cropper-hidden")) {
            cropper.element.cropper.destroy();
            var cropper = new Cropper(image, {
                aspectRatio:    0.86/1,
                crop: function(e) {}
            });
        }
        document.getElementById('crop_button').addEventListener('click', function() {
            var imgurl = cropper.getCroppedCanvas().toDataURL();
            var img = document.createElement("img");
            img.src = imgurl;
            img.style.cssText = "width:612px;height:709px;margin: 2rem;";
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
@endsection