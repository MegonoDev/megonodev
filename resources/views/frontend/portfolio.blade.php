@extends('layouts.frontend.master-frontend')
@section('title')
Portfolio |
@endsection
@section('content') 
 <!-- container -->
 <div class="container-fluid pt-4 text-dark ">
    <div class="row mx-md-5">
      <!-- list portfolio -->
      <div class="col-md-12 px-md-5 col-sm-12">
        <div class="text-dark text-center">
          <b>THE WORKS THAT WE HAVE DONE</b><br />
          <span>sort by the latest</span>

            @include('layouts.frontend.partials._works')

        </div>
      </div>
    </div>
  </div>
  @include('layouts.frontend.partials.footer')

  @include('layouts.frontend.partials._modals')

  @endsection

  @push('css')

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap-4.0.0/dist/css/bootstrap.min.css" />
    
    <!-- Styling -->
    <link rel="stylesheet" href="assets/style.css?rnd=123" />
    <link rel="stylesheet" href="assets/swiper/swiper.min.css?v=0" />
    <style>
    .swiper-container {
        width: 100%;
        height: auto;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }
    </style>
  @endpush
  @push('scripts')

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
  <script src="assets/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="assets/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
  <script src="assets/app.js"></script>
  <script src="assets/swiper/swiper.min.js"></script>

  <script>
    $('#modal-perizinan').on('shown.bs.modal', function () {
      var swiperPerizinan = new Swiper('.swiper-container-perizinan', {
        autoHeight: true,
        pagination: {
          el: '.swiper-pagination-perizinan',
          type: 'bullets',
          clickable: true,
        },
      });
    })
    $('#modal-viewer').on('shown.bs.modal', function () {
      var swiperViewer = new Swiper('.swiper-container-viewer', {
        autoHeight: true,
        pagination: {
          el: '.swiper-pagination-viewer',
          type: 'bullets',
          clickable: true,
        },
      });
    })
    $('#modal-eonesia').on('shown.bs.modal', function () {
      var swiperEonesia = new Swiper('.swiper-container-eonesia', {
        autoHeight: true,
        pagination: {
          el: '.swiper-pagination-eonesia',
          type: 'bullets',
          clickable: true,
        },
      });
    })

    $('#modal-antrian').on('shown.bs.modal', function () {
      var swiperAntrian = new Swiper('.swiper-container-antrian', {
        autoHeight: true,
        pagination: {
          el: '.swiper-pagination-antrian',
          type: 'bullets',
          clickable: true,
        },
      });
    })

    $('#modal-frame').on('shown.bs.modal', function () {
      var swiperFrame = new Swiper('.swiper-container-frame', {
        autoHeight: true,
        pagination: {
          el: '.swiper-pagination-frame',
          type: 'bullets',
          clickable: true,
        },
      });
    })
    $('#modal-event').on('shown.bs.modal', function () {
      var swiperVoting = new Swiper('.swiper-container-voting', {
        autoHeight: true,
        pagination: {
          el: '.swiper-pagination-voting',
          type: 'bullets',
          clickable: true,
        },
      });
    })
  </script>

  @endpush