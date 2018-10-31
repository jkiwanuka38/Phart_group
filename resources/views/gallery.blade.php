@extends('layout')
@section('title', 'Our Gallery')
@section('css')
   <link rel="stylesheet" href="{{asset('css/gallery.css')}}">
@endsection

@section('content')

{{--  <!-- Our Featured Works Area -->  --}}
<section class="featured_works row" data-stellar-background-ratio="0.3">
   @foreach ($projects as $project)
      <div class="tittle wow fadeInUp">
         <h2>{{$project->title}}</h2>
         <h4>{{$project->description}}</h4>
      </div>
      <div class="featured_gallery">
         <!-- Images used to open the lightbox -->
         <div class="imageRow row">
            @if ($project->images)
                @foreach (json_decode($project->images, true) as $image)
                  <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                     <img src="{{ projectImage($image) }}" style="width:100%">
                  </div>
               @endforeach
            @endif
         </div>
      </div>
   @endforeach
</section>
@endsection
