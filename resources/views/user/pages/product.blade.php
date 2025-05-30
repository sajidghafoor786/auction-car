 {{-- show single product paages --}}
 @extends('user.layout.app')
 @section('title')
     E-SHOP
 @endsection
 @section('bodyContent')
     <section class="section-5 pt-3 pb-3 mb-3 bg-white">
         <div class="container">
             <div class="light-font">
                 <ol class="breadcrumb primary-color mb-0">
                     <li class="breadcrumb-item"><a class="white-text" href="{{ route('user.home') }}">Home</a></li>
                     <li class="breadcrumb-item"><a class="white-text" href="{{ route('user.shop') }}">Shop</a></li>
                     <li class="breadcrumb-item">{{ $product->title }}</li>
                 </ol>
             </div>
         </div>
     </section>

     <section class="section-7 pt-3 mb-3">
         <div class="container">
             <div class="row ">
                 <div class="col-md-5">
                     {{-- single product image here  --}}
                     <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                         <div class="carousel-inner bg-light">

                             @if (!empty($product->images))
                                 @foreach ($product->images as $key => $productImage)
                                     <div class="carousel-item {{ $key == '0' ? 'active' : '' }}" style="height: 500px;">
                                         <img src="{{ asset('upload/products_img/' . $productImage->image) }}"
                                             alt="Image" style="width: 100%; height: 100%; object-fit: cover;">
                                     </div>
                                 @endforeach
                             @endif

                         </div>
                         <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                             <i class="fa fa-2x fa-angle-left text-dark"></i>
                         </a>
                         <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                             <i class="fa fa-2x fa-angle-right text-dark"></i>
                         </a>
                     </div>
                 </div>
                 {{-- list product here  --}}
                 <div class="col-md-7">
                     <div class="bg-light right">
                         <h1>{{ $product->title }}</h1>
                         <div class="d-flex mb-3">
                             <div class="text-primary mr-2">
                                 <small class="fas fa-star"></small>
                                 <small class="fas fa-star"></small>
                                 <small class="fas fa-star"></small>
                                 <small class="fas fa-star-half-alt"></small>
                                 <small class="far fa-star"></small>
                             </div>
                             <small class="pt-1">(99 Reviews)</small>
                         </div>
                         @if ($product->compare_price > 0)
                             <h2 class="price text-secondary"><del>{{ $product->compare_price }}/PKR</del></h2>
                         @endif
                         <h2 class="price ">{{ $product->price }}/PKR</h2>

                         <p>{{ $product->description }}</p>
                         @if ($product->qty > 0)
                             <a href="javascript:void(0);" onclick="addToCart({{ $product->id }});" class="btn btn-dark"><i
                                     class="fas fa-shopping-cart"></i> &nbsp;ADD TO CART</a>
                         @else
                             <a href="javascript:void(0);" class="btn btn-dark"><i class="fas fa-shopping-cart"></i>
                                 &nbsp;Out OF Stock</a>
                         @endif
                     </div>
                 </div>
                 {{-- review and other option here  --}}
                 <div class="col-md-12 mt-5">
                     <div class="bg-light">
                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                             <li class="nav-item" role="presentation">
                                 <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                     data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                     aria-selected="true">Description</button>
                             </li>
                             <li class="nav-item" role="presentation">
                                 <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping"
                                     type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping &
                                     Returns</button>
                             </li>
                             <li class="nav-item" role="presentation">
                                 <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                     type="button" role="tab" aria-controls="reviews"
                                     aria-selected="false">Reviews</button>
                             </li>
                         </ul>
                         <div class="tab-content" id="myTabContent">
                             <div class="tab-pane fade show active" id="description" role="tabpanel"
                                 aria-labelledby="description-tab">
                                 @if (!empty($product->short_desc))
                                     <p>{{ $product->short_desc }} </p>
                                 @else
                                     <p>Not Short Description about this product...</p>
                                 @endif
                             </div>
                             <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                                 @if (!empty($product->shipping_returns))
                                     <p>{{ $product->shipping_returns }} </p>
                                 @else
                                     <p>Not shipping_returns about this product...</p>
                                 @endif
                             </div>
                             <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     {{-- latest product  --}}
     <section class="pt-5 section-8">
         <div class="container">
             <div class="section-title">
                 <h2>Latest Products</h2>
             </div>
             <div class="col-md-12">
                 <div id="related-products" class="carousel">
                     @if ($productLatest->isNotEmpty())
                         @foreach ($productLatest as $product)
                             <div class="card product-card">
                                 <div class="product-image position-relative">
                                     @php
                                         $product_img = $product->images->first();
                                     @endphp
                                     <a href="{{ route('user.product', [str_replace(' ', '-', $product->slug)]) }}">
                                         <div class="" style="height: 300px;">
                                             <img src="{{ asset('upload/products_img/' . $product_img->image) }}"
                                                 alt="Image" style="width: 100%; height: 100%; object-fit: cover;">
                                         </div>
                                     </a>
                                     <a class="whishlist" href="javascript:void(0);"
                                         onclick="WishList({{ $product->id }});"><i class="far fa-heart"></i></a>
                                     @if ($product->qty > 0)
                                         <div class="product-action">
                                             <a class="btn btn-dark"href="javascript:void(0);"
                                                 onclick="addToCart({{ $product->id }});"> <i
                                                     class="fa fa-shopping-cart"></i> Add
                                                 To Cart </a>
                                         </div>
                                     @else
                                         <div class="product-action">
                                             <a class="btn btn-dark"href="javascript:void(0);"> <i
                                                     class="fa fa-shopping-cart"></i> Out Of Stock </a>
                                         </div>
                                     @endif
                                 </div>
                                 <div class="card-body text-center mt-3">
                                     <a class="h6 link" href="">{{ $product->title }}</a>
                                     <div class="price mt-2">
                                         @if ($product->compare_price > 0)
                                             <span
                                                 class="h6 text-unde rline"><del>{{ $product->compare_price }}</del></span>
                                         @endif
                                         <span class="h5"><strong>{{ $product->price }}</strong></span>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                     @endif

                 </div>
             </div>
         </div>
     </section>
 @endsection
