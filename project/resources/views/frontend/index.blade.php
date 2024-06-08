@extends('layouts.front')



@section('content')

<body>

   @include('partials.navbar')
    
    <div class="section-4 home">
       <div><img src="{{ asset('assets/images/home.png') }}" style="max-width: 90%" alt="Imhotep Companies Industry Leading, Best Architectural Design, Best Casino Designer in Las Vegas, Nevada" width="1200" sizes="(max-width: 1200px) 100vw, 1200px"  class="image-108"></div>
       <div class="container-8 w-container">
          <h1 class="h4-2">Our Service</h1>
       </div>
    </div>
    <div>
       <div class="text home text-center">Inspired by Imhotep the architect. Imhotep Companies is a full-scale developer of online<br>businesses, real estate development, and income-producing assets.<br><br>Net-Value: 10 million</div>
    </div>
    <div class="section-26">
       <div class="columns-7 w-row">
          <div class="column-42 w-col w-col-4">
             <div class="div-col-1 _2">
                <h1 class="h3">Portfolio</h1>
                <a href="{{ route('portfolio') }}" class="w-inline-block"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt="Imhotep Companies: Master Builder of Casino, Gaming, Resorts, and Entertainment Architects and Designers in Las Vegas, NV." class="home-col-1-img"></a>
                <a href="{{ route('portfolio') }}" class="h5 col1">More PORTFOLIOS....</a>
             </div>
          </div>
          <div class="column-43 w-col w-col-4">
             <div class="div-col-2">
                <h1 class="h3">Future Project</h1>
                <a href="{{ route('future.project') }}" class="link-block-20 w-inline-block"><img src="{{ asset('assets/images/futureproject.jpg') }}" alt="Future Project" class="home-col-2-img"></a>
                <a href="{{ route('future.project') }}" target="_blank" class="h5 col2">More FUTURE PROJECTS...</a>
             </div>
          </div>
          <div class="column-51 w-col w-col-4">
             <div class="div-col-2">
                <h1 class="h3">Successfull Exist</h1>
                <a href="" class="link-block-20 w-inline-block"><img src="{{ asset('assets/images/'.$projects[2]->photo) }}" alt="{{ $projects[2]->title }}" sizes="(max-width: 479px) 100vw, (max-width: 767px) 300px, (max-width: 991px) 39vw, 350px"  class="home-col-2-img"></a>
                <a href="" class="h5 col2">More Successfull exist...<br></a>
             </div>
          </div>
       </div>
    </div>
    

    @include('partials.footer')
   
    


 </body>

  
@endsection




