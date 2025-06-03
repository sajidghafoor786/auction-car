@extends('frontend.layout.app')
@section('title')
Car Auction | Terms & condition
@endsection
@section('content')
<div class="container py-5">
    <h2>Terms and Conditions</h2>
    <p>Welcome to {{ config('app.name') }}. By accessing or using our platform, you agree to the following terms...</p>
    <ul>
        <li>You must be 18 years or older to use our services.</li>
        <li>All information provided must be accurate and up-to-date.</li>
        <li>We reserve the right to modify or terminate the service for any reason.</li>
        <li>Misuse of the platform may result in termination of your account.</li>
    </ul>
</div>
@endsection
