@extends('layout.admin')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        @if(session('error'))
            <div id="error" class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Banners /</span> Add
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="{{ route('listBanners') }}" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="{{ route('storeBanner') }}" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Name <span class="steric">*</span></label>
                                <input type="text" name="name" id="name"
                                       class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       placeholder="Enter Banner Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container" id="banner-type">
                                <label class="form-label">Type of Banner <span class="steric">*</span></label>
                                <select name="type" id="type" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}">
                                    <option value="" selected>Select Type of Banner</option>
                                    <option {{(old('type') == 'Guides' )? "selected" : old('type')}} value="Guides">Guides</option>
                                    <option {{(old('type') == 'Home-Page' )? "selected" : old('type')}} value="Home-Page">Home Page</option>
                                    <option {{(old('type') == 'App-Store' )? "selected" : old('type')}} value="App-Store">App Store</option>
                                    <option {{(old('type') == 'Background-Section' )? "selected" : old('type')}} value="Background-Section">Background Section</option>
                                    <option {{(old('type') == 'Home-Page-2' )? "selected" : old('type')}} value="Home-Page-2">Home Page 2</option>
                                    <option {{(old('type') == 'Home-Page-3' )? "selected" : old('type')}} value="Home-Page-3">Home Page 3</option>
                                    <option {{(old('type') == 'Home-Page-4' )? "selected" : old('type')}} value="Home-Page-4">Home Page 4</option>
                                    <option {{(old('type') == 'Home-Page-5' )? "selected" : old('type')}} value="Home-Page-5">Home Page 5</option>

                                </select>
                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-12">
                                <label class="form-label">Short Description</label>
                                <textarea name="description" class="form-control ckeditor" rows="4"></textarea>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label class="form-label">Name Color</label>
                                <div class="input-group my-colorpicker2">
                                    <input type="text" name="name_color" value="#000" class="form-control" required>
                                    <div class="input-group-append" >
                                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label class="form-label">Short Description Color</label>
                                <div class="input-group my-colorpicker2">
                                    <input type="text" name="description_color" value="#000" class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Image <span class="steric">*</span></label> <span> <b>(</b>Recommended
                                    Size 2MB<b>)</b> </span>
                                <input type="file" id="image_url"
                                       class="form-control {{ $errors->has('image_url') ? ' is-invalid' : '' }}"
                                       name="image_url" required>
                                @if ($errors->has('image_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_url') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group">
                                    <img id="web_image" src="" class="thumbnail-image-100">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Image (for mobile device Recommended
                                    Size 2MB) <span class="steric">*</span></label>
                                <input type="file" id="mobile_device_image"
                                       class="form-control {{ $errors->has('mobile_device_image') ? ' is-invalid' : '' }}"
                                       name="mobile_device_image" required>
                                @if ($errors->has('mobile_device_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile_device_image') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group">
                                    <img id="mobile_image" src="" class="thumbnail-image-100">
                                </div>
                            </div>

                            <!-- <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container d-none">
                                <label class="form-label">Guide Image</label> <span> <b>(</b>Recommended
                                    Size 2MB<b>)</b> </span>
                                <input type="file" id="guide_image"
                                       class="form-control {{ $errors->has('guide_image') ? ' is-invalid' : '' }}"
                                       name="guide_image" required>
                                @if ($errors->has('guide_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('guide_image') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group">
                                    <img id="guide_web_image" src="" class="thumbnail-image-100">
                                </div>
                            </div> -->

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">External Link </label>
                                <input type="text" name="external_link" id="external_link" class="form-control" placeholder="Enter External Link">
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Status</label>
                                <div>
                                    <input name="is_active" checked type="checkbox"
                                           {{ (old("is_active") == 1 ? "checked":'') }} data-toggle="toggle">
                                    <input type="hidden" name="is_active" id="is_active"
                                           value="{{ (old("is_active") == 1 ? 1 : 0) }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
            $('input#is_active').val('1');
         });
    $("#banner-type").change(function () {
        var type = $("#type").val();
        if (type == 'Home-Page' || type == 'Home-Page-2' || type == 'Home-Page-3') {
            $(".toggle-banner-link").show();
            $(".toggle-banner-link-sub").show();
        }else{
            $(".toggle-banner-link").hide();
            $(".toggle-banner-link-sub").hide();
            $("#banner_link").val('0');
            $("#product_id").val('0');
        }
    });

    $('input[name="is_active"]').change(function() {
        if ($(this).is(":checked")) {
            $('input#is_active').val('1');
        } else {
            $('input#is_active').val('0');
        }
    });



    $("#image_url").change(function () {
        readURL(this, '#web_image');
        });
        function readURL(input, element) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(element).attr('src', e.target.result);
                    $(element).removeClass("hidden");
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    $("#mobile_device_image").change(function () {
        readURL(this, '#mobile_image');
        });
        function readURL(input, element) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(element).attr('src', e.target.result);
                    $(element).removeClass("hidden");
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#guide_image").change(function () {
        readURL(this, '#guide_web_image');
        });
        function readURL(input, element) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(element).attr('src', e.target.result);
                    $(element).removeClass("hidden");
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

    <script>
        $('#banner_link').change(function() {
            if ($(this).val() == "2") {
                $('#product_id').attr('required', 'required');
            } else {
                $('#product_id').removeAttr('required');
            }
        });

        $('#banner_link').on('change', function() {

            var bannerLink = $('#banner_link').find(":selected").val();
            if (bannerLink == 0) {
                $('#banner_link_url').hide();
                $('#banner_product').hide();
            }
            if (bannerLink == 1) {
                $('#banner_link_url').show();
                $('#banner_product').hide();
            }
            if (bannerLink == 2) {
                $('#banner_link_url').hide();
                $('#banner_product').show();
            }

        });
    </script>

<script>
    setTimeout(function(){
        document.getElementById('error').style.display = 'none';
    }, 2000);
</script>

<script>
    $(document).ready(function() {
        $('.my-colorpicker2').colorpicker().on('colorpickerChange', function(event) {
            $(this).find('.input-group-text i').css('color', event.color.toString());
        });
    });

</script>

<script>

    $(document).ready(function () {
        $('#external_link').click(function() {
        this.value = 'https://';
        });
    });

</script>
@endsection
