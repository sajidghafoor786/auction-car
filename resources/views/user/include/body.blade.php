 <section class="section-2">
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="box shadow-lg">
                     <div class="fa icon fa-check text-primary m-0 mr-3"></div>
                     <h2 class="font-weight-semi-bold m-0">Quality Product</h5>
                 </div>
             </div>
             <div class="col-lg-3 ">
                 <div class="box shadow-lg">
                     <div class="fa icon fa-shipping-fast text-primary m-0 mr-3"></div>
                     <h2 class="font-weight-semi-bold m-0">Free Shipping</h2>
                 </div>
             </div>
             <div class="col-lg-3">
                 <div class="box shadow-lg">
                     <div class="fa icon fa-exchange-alt text-primary m-0 mr-3"></div>
                     <h2 class="font-weight-semi-bold m-0">14-Day Return</h2>
                 </div>
             </div>
             <div class="col-lg-3 ">
                 <div class="box shadow-lg">
                     <div class="fa icon fa-phone-volume text-primary m-0 mr-3"></div>
                     <h2 class="font-weight-semi-bold m-0">24/7 Support</h5>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <section class="section-3">
     <div class="container">
         <div class="section-title">
             <h2>Categories</h2>
         </div>
         <div class="row pb-3">
             @if (getCategortAll()->isNotEmpty())
                 @foreach (getCategortAll() as $category)
                     <div class="col-lg-3">
                         <div class="cat-card">
                             @if ($category->image !== '')
                                 <div class="left">
                                     <img src="{{ 'upload/category_img/' . $category->image }}" alt=""
                                         class="img-fluid">
                                 </div>
                             @endif
                             <div class="right">
                                 <div class="cat-data">
                                     <h2>{{ $category->name }}</h2>
                                     {{-- <p>100 Products</p> --}}
                                 </div>
                             </div>
                         </div>
                     </div>
                 @endforeach
             @endif
         </div>
     </div>
 </section>

 <section class="section-4 pt-5">
     <div class="container">
         <div class="section-title">
             <h2>Featured Products</h2>
         </div>
         <div class="row pb-3">
             @if (getProduct()->isNotEmpty())
                 @foreach (getProduct() as $product)
                     <div class="col-md-3">
                         <div class="card product-card" style="height: 420px; overflow: hidden;">
                             <div class="product-image position-relative">
                                 @php
                                     $product_img = $product->images->first();
                                 @endphp
                                 {{-- image here  --}}
                                 <div style="height: 300px;">
                                     <a href="{{ route('user.product', [str_replace(' ', '-', $product->slug)]) }}"
                                         class="product-img" style="display: block; height: 100%; width: 100%;">
                                         @if (!empty($product_img))
                                             <img src="{{ asset('upload/products_img/' . $product_img->image) }}"
                                                 alt="user1" style="width: 100%; height: 100%; object-fit: cover;">
                                         @endif
                                     </a>
                                 </div>
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
                                 <a class="h6 link" href="{{ route('user.product', [str_replace(' ', '-', $product->slug)]) }}">{{ $product->title }}</a>
                                 <div class="price mt-2">
                                     <span class="h5"><strong>{{ $product->price }}/PKR</strong></span>
                                     @if ($product->compare_price > 0)
                                         <span class="h6 text-underline"><del>{{ $product->compare_price }}</del></span>
                                     @endif
                                 </div>
                             </div>
                         </div>
                     </div>
                 @endforeach
             @endif
         </div>
     </div>
 </section>

 <section class="section-4 pt-5">
     <div class="container">
         <div class="section-title">
             <h2>Latest Produsts</h2>
         </div>
         <div class="row pb-3">
             @if (getProductLatest()->isNotEmpty())
                 @foreach (getProductLatest() as $product)
                     <div class="col-md-3">
                         <div class="card product-card" style="height: 420px; overflow: hidden;">
                             <div class="product-image position-relative">
                                 @php
                                     $product_img = $product->images->first();
                                 @endphp
                                 {{-- image here  --}}
                                 <div style="height: 300px;">
                                     <a  href="{{ route('user.product', [str_replace(' ', '-', $product->slug)]) }}" class="product-img"
                                         style="display: block; height: 100%; width: 100%;">
                                         @if (!empty($product_img))
                                             <img src="{{ asset('upload/products_img/' . $product_img->image) }}"
                                                 alt="user1" style="width: 100%; height: 100%; object-fit: cover;">
                                         @endif
                                     </a>
                                 </div>
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
                                 <a class="h6 link" href="{{ route('user.product', [str_replace(' ', '-', $product->slug)]) }}">{{ $product->title }}</a>
                                 <div class="price mt-2">
                                     <span class="h5"><strong>{{ $product->price }}/PKR</strong></span>
                                     @if ($product->compare_price > 0)
                                         <span
                                             class="h6 text-underline"><del>{{ $product->compare_price }}</del></span>
                                     @endif
                                 </div>
                             </div>
                         </div>
                     </div>
                 @endforeach
             @endif
         </div>
     </div>
 </section>
