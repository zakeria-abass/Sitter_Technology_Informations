<?php
$About= 'about_'.app()->currentLocale();
$Name='name_'.app()->currentLocale();

?>

@extends('layout.master')

@section('title','مشاريع الطلاب')






@section('content')

    <section class="container mt-5  bg-white" >
           <h3 class="card-title">{{$details->$Name}}</h3>
     <div class="row">

             <div class="col-lg-8 col-md-12 portfolio-item ">
                 <div class="portfolio-img rounded overflow-hidden">
                     <img class="img-fluid" width="100%"   src="{{asset('assets_admin_dashboard/img_project/'.$details->name_en.'/'.$details->imge)}}" alt="" >
                     <div class="portfolio-btn text-center">
                         <h1 class="text-white">{{$details->$Name}}</h1>

                         <div class="mt-3 text-center justify-content-center">
                             <a class="btn btn-lg-square btn-primary border-2 mx-1" href=""><i class="fa fa-link"></i></a>
                         </div>
                     </div>
                 </div>
             </div>


         <div class="col-lg-4 col-md-12">

             @if($details->download == 1)
             <div class="card">
                 <div class="card-body">
                        <h6 class="card-title">Free download</h6>
                      @if($details->attachment)
                         <form action="  {{asset('assets_admin_dashboard/img_project/'.$details->name_en.'/'.$details->attachment)}}" >
                             <button id="myButton" type="submit"  class="btn btn-success col-12">Downlode <i class="fa fa-download"></i></button>
                              <input hidden name="count" type="number" value="1">
                         </form>
                     @else

                         <a  class="btn btn-success col-12">Downlode <i class="fa fa-download"></i></a>

                     @endif
                     <p class="card-text mt-3 "> <i class="fa fa-check-circle text-success"></i>  Open source Use in </p>
                     <p class="card-text mt-3 "> <i class="fa fa-check-circle text-success"></i>  commercial projects </p>
                 </div>
                 <div class="card-footer justify-content-between align-center d-flex">
                     <p class="card-text mt-3 "> <i class="fa fa-download text-success"></i> 5895 </p>
                     <p class="card-text mt-3 "> Downlode </p>

                 </div>

             </div>
             @else
                 <div class="card">
                     <div class="card-body">
                         <h6 class="card-title">Can't download</h6>

                         <button class="btn btn-danger col-12">Downlode <i class="fa fa-lock "></i></button>

                         <p class="card-text mt-3 "> <i class="fa fa-check text-danger"></i>  Open source Use in </p>
                         <p class="card-text mt-3 "> <i class="fa fa-check text-danger"></i>   commercial projects </p>
                     </div>
                 </div>

             @endif
             <div class="card mt-3">
                 <div class="card-body">
                        <h6 class="card-title">Register a new student</h6>

                     <a href="{{route('NewAcount')}}" class="btn btn-info col-12 mt-3">Register <i class="fa fa-registered"></i></a>

                 </div>

             </div>


         </div>

         <div class="col-lg-12 col-md-12" >
             <h3 class="card-title mt-4">Description</h3>

                 {!! $details->$About !!}

         </div>

         <h4 class="card-title mt-4 col-lg-12 col-md-12">New Project</h4>
         <div class="row " >
             @foreach($projects->where('id','!=',$details->id) as $project)
                 <div class="col-lg-4 col-md-6 portfolio-item  mt-2">
                     <div class="portfolio-img rounded overflow-hidden">
                         <img class="img-fluid" width="100%"   src="{{asset('assets_admin_dashboard/img_project/'.$project->name_en.'/'.$project->imge)}}" alt="" >
                         <div class="portfolio-btn text-center">
                             <h1 class="text-white">{{$project->$Name}}</h1>

                             <div class="mt-3">
                                 <a  class="btn btn-lg-square btn-primary border-2 mx-1" href="{{route('project_details',$project->id)}}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                 <a class="btn btn-lg-square btn-primary border-2 mx-1" href=""><i class="fa fa-link"></i></a>
                             </div>
                         </div>
                     </div>
                 </div>

             @endforeach


         </div>

     </div>


    </section>


    <script>
        // Get the button element
        var button = document.getElementById("myButton");
        // Add an event listener to the button that listens for a "click" event
        button.addEventListener("click", function() {
            // Change the text on the page
            button.innerHTML = "تم التنزيل";
        });

    </script>
@stop



