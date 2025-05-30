 @extends('user.layout.app')
 @section('title')
     Register
 @endsection
 @section('bodyContent')
     <section class="section-5 pt-3 pb-3 mb-3 bg-white">

         <div class="container">
             <div class="light-font">
                 <ol class="breadcrumb primary-color mb-0">
                     <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                     <li class="breadcrumb-item">Register</li>
                 </ol>
             </div>
         </div>
     </section>

     <section class=" section-10">
         <div class="container">
              <div class="offset-5 col-lg-4">

                <img src="{{ asset('admin-2/assets-2/logo/logo-2.png') }}"
                    style="height: 150px; width: 200px;object-fit: cover; ">

            </div>
             <div class="login-form">
                 <form role="form" class="text-start" method="POST" action="{{route('user.process-register')}}">
                     @csrf
                     <h4 class="modal-title">Register Now</h4>
                     <div class="form-group">
                         <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                             value="{{ old('name') }}" placeholder="Name">
                         @error('name')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                     <div class="form-group">
                         <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                             value="{{ old('email') }}" placeholder="Email">
                         @error('email')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                     <div class="form-group">
                         <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                             placeholder="phone" value="{{ old('phone') }}">
                         @error('phone')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                     <div class="form-group">
                         <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                             placeholder="Password">
                         @error('password')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                     <div class="form-group">
                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password">
                                                   
                     </div>
                     <div class="form-group small">
                         <a href="#" class="forgot-link">Forgot Password?</a>
                     </div>
                     <button type="submit" class="btn btn-dark btn-block btn-lg" value="Register">Register</button>
                 </form>
                 <div class="text-center small">Already have an account? <a href="{{route('user.login')}}">Login Now</a></div>
             </div>
         </div>
     </section>
 @endsection
