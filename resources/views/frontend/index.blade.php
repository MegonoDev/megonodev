@extends('layouts.frontend.master-frontend')
@section('title')

@endsection
@section('content')
<canvas id="canvas">Canvas is not supported in your browser</canvas>
<a href="{{ route('frontend.profile') }}">
    <img src="{{ asset('assets/img/logo.png') }}" alt="" />
</a>
@include('layouts.frontend.partials.footer')
@endsection

@push('css')

    <!-- Custom Hujan -->
    <link
      rel="stylesheet"
      href="{{ asset('assets/custom.css') }}"
    />

    <!-- Styling -->
    <link rel="stylesheet" href="{{ asset('assets/index.css?rnd=123') }}" />

@endpush

@push('scripts')


<script src="https://cdn.jsdelivr.net/npm/p5@0.10.2/lib/p5.js"></script>
    <!-- <script src="assets/particles.js"></script> -->
    <script src="{{ asset('assets/custom.js') }}"></script>

@endpush