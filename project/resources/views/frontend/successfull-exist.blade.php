@extends('layouts.front')



@section('content')

<body>

    @include('partials.navbar')
    <hr>
    <div>
        <div class="text home text-center">Inspired by Imhotep the architect. Imhotep Companies is a full-scale developer of online<br>businesses, real estate development, and income-producing assets.<br><br>Net-Value: 10 million</div>
    </div>

    <hr>

    <div>
        <h1 class="h2">Successfully Exist</h1>
    </div>

    <div class="section"></div>

    <div class="section-4 row-1">
        <a href="#" class="link-block-3 w-inline-block"></a>
        <div class="container">
            <div class="row">
                @foreach ($successfully as $item)
                <div class="col-md-6 mb-5">
                    <a href="#" class="link-block-29 w-inline-block"><img class="img-fluid" style="width: 90%" src="{{ getPhoto($item->photo) }}" alt="{{ $item->title }}">
                        <div class="h5  mt-3">{{ $item->title }}<br>‍‍</div>
                    </a>
                </div>
                @endforeach

            </div>

        </div>
    </div>

    @include('partials.footer')


</body>

@endsection
