<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ $bcrum['url-first'] }}">{{ $bcrum['name-first'] }}</a></li>
        @if(isset($bcrum['url-second']))
        <li class="breadcrumb-item"><a href="{{ $bcrum['url-second'] }}">{{ $bcrum['name-second'] }}</a></li>
        @endif
        <li class="breadcrumb-item active">{{ $bcrum['current'] }}</li>
    </ol>
    <!-- Breadcrumb Menu-->
</div>