@extends('layout.admin')

@section('styles')
<style>
    .required-star{
        color:red;
    }
</style>
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
            <span class="text-muted fw-light">Banners /</span> Edit
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
                        <form role="form" action="{{ route('updateBanner') }}" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Name <span class="steric">*</span></label>
                                <input type="text" name="name" id="name"
                                       class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       placeholder="Enter Banner Name" value="{{ $banner->name ?? old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container" id="banner-type">
                                <label class="form-label">Type of Banner <span class="steric">*</span></label>
                                <select name="type" id="type" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}">
                                    <option value="" {{($banner->type == '') ? 'selected': old('type')}}>Select Type of Banner</option>
                                    <option {{( $banner->type == 'Guides' ) ? 'selected' : old('type')}} value="Guides">Guides</option>
                                    <option {{( $banner->type == 'Home-Page' ) ? 'selected' : old('type')}} value="Home-Page">Home Page Banner 1</option>
                                    <option {{( $banner->type == 'App-Store' )? "selected" : old('type')}} value="App-Store">App Store</option>
                                    <option {{( $banner->type == 'Background-Section' )? "selected" : old('type')}} value="Background-Section">Background Section</option>
                                    <option {{( $banner->type == 'Home-Page-2' ) ? 'selected' : old('type')}} value="Home-Page-2">Home Page Banner 2</option>
                                    <option {{( $banner->type == 'Home-Page-3' ) ? 'selected' : old('type')}} value="Home-Page-3">Home Page Banner 3</option>
                                    <option  {{( $banner->type == 'Home-Page-4' ) ? 'selected' : old('type')}} value="Home-Page-4">Home Page Banner 4</option></option>
                                    <option  {{( $banner->type == 'Home-Page-5' ) ? 'selected' : old('type')}} value="Home-Page-5">Home Page Banner 5</option></option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-12">
                                <label class="form-label">Short Description</label>
                                <textarea name="description" class="form-control ckeditor" rows="4">{{ $banner->description }}</textarea>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label class="form-label">Name Color</label>
                                <div class="input-group my-colorpicker2">
                                    <input type="text" name="name_color" value="{{ old('name_color', $banner->name_color ?? '#000') }}" class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-square" style="color: {{ $banner->name_color ?? '#000' }};"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label class="form-label">Short Description Color</label>
                                <div class="input-group my-colorpicker2">
                                    <input type="text" name="description_color" value="{{ old('description_color', $banner->description_color ?? '#000') }}" class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-square" style="color: {{ $banner->description_color ?? '#000' }};"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Image <span class="required-star">*</span></label>
                                 <span class="recommended-size"> <b>(</b>2MB with Dimensions 487*603<b>)</b> </span>
                                <input type="file" id="image_url"
                                       class="form-control {{ $errors->has('image_url') ? ' is-invalid' : '' }}"
                                       name="image_url">
                                @if ($errors->has('image_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_url') }}</strong>
                                    </span>
                                @endif

                                @if($banner->image_url)
                                    <img id="banner_display" src="{{ Storage::url($banner->image_url) }}" alt="Banner Image"
                                         class="w-px-100" />
                                @else
                                    <img id="banner_display" src="{{ asset('assets/img/avatars/placeholder.png')}}"
                                         alt="Banner Image" class="w-px-100">
                                @endif
                                <div class="form-group">
                                    <img id="web_image" src="" class="thumbnail-image-100">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label ">Image </label><span class="required-star"> * </span><b>(</b>for mobile device <span class="recommended-size">
                               2MB with Dimensions 487*603 <b>)</b></span>)
                                <input type="file" id="mobile_device_image"
                                       class="form-control {{ $errors->has('mobile_device_image') ? ' is-invalid' : '' }}"
                                       name="mobile_device_image">
                                @if ($errors->has('mobile_device_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile_device_image') }}</strong>
                                    </span>
                                @endif

                                @if($banner->mobile_device_image)
                                    <img id="banner_display_mobile" src="{{ Storage::url($banner->mobile_device_image) }}" alt="Banner Image"
                                         class="w-px-100" />
                                @else
                                    <img id="banner_display_mobile" src="{{ asset('assets/img/avatars/placeholder.png')}}"
                                         alt="Banner Image" class="w-px-100">
                                @endif
                                <div class="form-group">
                                    <img id="mobile_image" src="" class="thumbnail-image-100">
                                </div>
                            </div>

                            <!-- <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container d-none">
                                <label class="form-label">Guide Image <span class="required-star">*</span></label>
                                 <span class="recommended-size"> <b>(</b>2MB with Dimensions 487*603<b>)</b> </span>
                                <input type="file" id="guide_image"
                                       class="form-control {{ $errors->has('guide_image') ? ' is-invalid' : '' }}"
                                       name="guide_image">
                                @if ($errors->has('guide_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('guide_image') }}</strong>
                                    </span>
                                @endif

                                @if($banner->guide_image)
                                    <img id="guide_display" src="{{ Storage::url($banner->guide_image) }}" alt="Guide Image"
                                         class="w-px-100" />
                                @else
                                    <img id="guide_display" src="{{ asset('assets/img/avatars/placeholder.png')}}"
                                         alt="Guide Image" class="w-px-100">
                                @endif
                                <div class="form-group">
                                    <img id="guide_web_image" src="" class="thumbnail-image-100">
                                </div>
                            </div> -->

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">External Link </label>
                                <input type="text" name="external_link" id="external_link" class="form-control"
                                    placeholder="Enter External Link"
                                    value="{{ old('external_link', $banner->link_url ?? '') }}">
                            </div>


                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Status</label>
                                <div>
                                    @if ($banner->status == 0)
                                    <input name="is_active" type="checkbox" class="" data-toggle="toggle">
                                    <input type="hidden" name="is_active" id="is_active" value="{{$banner->status}}">
                                @else
                                    <input name="is_active" type="checkbox" class="" checked data-toggle="toggle">
                                    <input type="hidden" name="is_active" id="is_active" value="{{$banner->status}}">
                                @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="banner_id" value="{{$banner->id}}" />
                                <button type="submit" class="btn btn-primary">Update</button>
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

        const typeFirst = $("#type").val();
        if (typeFirst == 'Home-Page' || typeFirst == 'Home-Page-2' || typeFirst == 'Home-Page-3') {
            $("#banner-type").trigger('change');
        }

        $('input[name="is_active"]').change(function() {
            if ($(this).is(":checked")) {
                $('input#is_active').val('1');
            } else {
                $('input#is_active').val('0');
            }
        });

        $("#image_url").change(function () {
            $('#banner_display').attr('src', '').css('display', 'none');
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
            $('#banner_display_mobile').attr('src', '').css('display', 'none');
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
            $('#guide_display').attr('src', '').css('display', 'none');
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
            function updateRecommendedSize() {
                var type = $("#type").val();
                var recommendedSizeText = "";
                if (type == 'Home-Page') {
                    recommendedSizeText = "(2MB with Dimensions 487*603)";
                } else if (type == 'Home-Page-2') {
                    recommendedSizeText = "(2MB with Dimensions 1240*576)";
                } else if (type == 'Home-Page-3') {
                    recommendedSizeText = "(2MB with Dimensions 1000*690)";
                } else {
                    recommendedSizeText = "(2MB with Dimensions 487*603)";
                }

                $(".recommended-size").html(recommendedSizeText);
            }
            updateRecommendedSize();
            $("#type").change(function () {
                updateRecommendedSize();
            });
        });
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
