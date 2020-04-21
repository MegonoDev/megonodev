@extends('layouts.frontend.master-frontend')
@section('title')
Profile |
@endsection
@section('content') 
<!-- container -->
<div class="container-fluid pt-5">
    <div class="row mx-md-5 content">
      <!-- card -->
      <div class="col-md-4 col-sm-12">
        <div class="card">
          <div class="card-body">
            Hello, We Are
            <p class="card-text text-dark name">
              Megono Developer
            </p>
            <p class="card-text">
              We working as a
              <font class="text-dark font-weight-bold">Freelancer (Web Developer, Web App, and Android App)</font>.
            </p>
          </div>
        </div>
      </div>
      <!-- list-social-media -->
      <div class="col-md-8 pt-3 mt-2">
        <p class="text-dark text-center">
          YOU CAN FIND ON
        </p>
        <div class="row">
          <div class="col-12 text-center">
            <!-- <a
                href=""
                target="_blank"
                class="btn btn-outline-primary mx-3 mt-3"
              > 
                <i class="fa fa-linkedin-square mr-1" aria-hidden="true"></i>
                LinkedIn
              </a> -->
            <a href="https://github.com/orgs/MegonoDev" target="_blank" class="btn btn-outline-dark mx-3 mt-3">
              <i class="fa fa-github-square mr-1" aria-hidden="true"></i>
              Github
            </a>
            <a href="mailto:megono.develop@gmail.com" target="_blank" class="btn btn-outline-danger mx-3 mt-3">
              <i class="fa fa-envelope mr-1" aria-hidden="true"></i> Email
            </a>
            <a href="https://www.instagram.com/megonodev/" target="_blank" class="btn btn-outline-secondary mx-3 mt-3">
              <i class="fa fa-instagram mr-1" aria-hidden="true"></i>
              Instagram
            </a>
          </div>
          <div class="col-12 text-center mt-4">
            <!-- <a href="#" class="btn btn-dark mx-3 mt-3" data-toggle="tooltip" data-placement="bottom"
              title="Sorry, It's not Available for now">
              <i class="fa fa-id-card mr-1" aria-hidden="true"></i>
              See Our CV
            </a> -->
            <a href="{{ route('frontend.portfolio') }}" class="btn btn-dark mx-3 mt-3">
              <i class="fa fa-folder-open mr-1" aria-hidden="true"></i>
              Portfolio
            </a>
            <a href="{{ route('frontend.team') }}" class="btn btn-dark mx-3 mt-3">
              <i class="fa fa-users mr-1" aria-hidden="true"></i>
              Team
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
  @include('layouts.frontend.partials.footer')

@endsection

@push('css')

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('assets/bootstrap-4.0.0/dist/css/bootstrap.min.css') }}" />

  <!-- Styling -->
  <link rel="stylesheet" href="{{ asset('assets/style.css?rnd=123') }}" />

@endpush

@push('scripts')

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
  <script src="{{ asset('assets/jquery-3.4.1.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="{{ asset('assets/bootstrap-4.0.0/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/app.js') }}"></script>

@endpush