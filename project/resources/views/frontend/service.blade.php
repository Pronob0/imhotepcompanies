@extends('layouts.front')



@section('content')

<body>

    @include('partials.navbar')

   

    <div>
        <h1 class="h2">Services</h1>
    </div>

    <div class="section"></div>

    <div class="section-4 row-1">
        <a href="#" class="link-block-3 w-inline-block"></a>
        @foreach ($services as $item)
        <a href="{{ route('future.details',$item->slug) }}" class="link-block-29 w-inline-block"><img src="{{ getPhoto($item->photo) }}"
                alt="{{ $item->title }}"
                sizes="(max-width: 479px) 90vw, (max-width: 767px) 350px, (max-width: 991px) 46vw, 325px"
                class="image-42">
            <div class="h5 port-gallery">{{ $item->title }}<br>‍‍</div>
        </a>

        @endforeach


    </div>


    @include('partials.footer')


</body>

@endsection