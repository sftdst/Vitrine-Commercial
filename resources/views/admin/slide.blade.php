@extends('layouts.app')

@section('title', 'Slides')


<main id="main" class="main">
<section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
            @foreach ($slides as $slide)
            <div class="card-body">
                <h5 class="card-title">{{$slide->description}}</h5>

                <!-- Slides only carousel -->
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{$slide->image}}" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div><!-- End Slides only carousel-->

              </div>
            @endforeach

          </div>
        </div>
    </div>
</section>
</main>
