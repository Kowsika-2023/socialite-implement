@extends('frontendviews.templates.app')
@section('content')
@extends('frontendviews.templates.navbar')
<div class="abou-pages">
    <h3>Services</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, earum aliquid quos quisquam </p>
</div>
<!-- services design -->
<div class="my-4   w-90">
    <div class="search-container w-50 m-auto">
        <form action="{{route('frontendviews.search')}}" method="GET" >
            @csrf
            <div class="sea  ">

                <div id="searchform">
                    <input type="text" id="search-bar" autocomplete="off" type="text" name= "search" class="form-control" placeholder="Search the job title" />
                    <ul class="output" style="display: none"></ul>
                    <button class="btn-sea d-sm-block d-none" type="submit">
                        <i class="fa fa-search"></i> Search
                    </button>
                    <button class="btn-sea d-sm-none d-block" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="  d-flex-wrap  my-3">
        @if($services)
            @foreach($services as $service)
            
                <div class="col-md-4 col-12 px-2 my-2">
            

                    <a href=" {{route('frontendviews.service.details',[$service->slug_name])}}">
                        <div class="owl-box h-100">
                            <h6>Team members- {{$service->team_members}}</h6>

                            <div class="cir-img">
                                <img src="{{asset('images/services/'.$service->image)}}" alt="ur img">
                            </div>
                            <div class="my-2 service-con">
                            <h5>{{$service->name}}</h5>

                            
                                <p>{!! $service->description !!}</p>
                            </div>
                        </div>

                    </a>
                
                </div>

            @endforeach
        @else
                <div class="form-outline mb-4 col-8">
                <h1>No Results Found </h1>
                </div>
        @endif
      
    </div>
</div>

<!-- services design end -->
@endsection