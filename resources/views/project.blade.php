<?php
$About= 'about_'.app()->currentLocale();
$Name='name_'.app()->currentLocale();

?>
@extends('layout.master')

@section('title','مشاريع الطلاب')



@section('content_before')


    <!--Waves Container-->
    <div class="inner-header flex">
        <!--Just the logo.. Don't mind this-->
        <div class="mr-5 col-sm-11 " >
            <form method="get" class="d-flex  align-items-center justify-content-center ">
                <input type="search" name="search"  class="form-control col-sm-5 p-4"style="border-radius:5px 0px " placeholder="{{__('main.أبحث')}}" value="{{request()->search}}">
                <button type="submit" class="btn btn-light  align-items-center" style="padding: 12px ;border-radius:0px 5px "><i class="fa fa-search text-primary"></i></button>
            </form>
        </div>

        <div style="" class="position-absolute wrap_circle">
            <div class="wrap">
                <div class="circle horizontal c1">
                    <div class="wrap-electron">
                        <div class="circle electron"></div>
                    </div>
                </div>
                <div class="circle vertical c1">
                    <div class="wrap-electron">
                        <div class="circle electron"></div>
                    </div>
                </div>
            </div>
            <div class="wrap r">
                <div class="circle horizontal c2">
                    <div class="wrap-electron">
                        <div class="circle electron"></div>
                    </div>
                </div>
                <div class="circle vertical c2">
                    <div class="wrap-electron">
                        <div class="circle electron"></div>
                    </div>
                </div>
                <div class="circle center"></div>
            </div>
        </div>
    </div>
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
    <!--Waves end-->
@stop


@section('content')





<section class="section-preview">

    <div class="container-xxl py-6 pt-5">
        <div class="container">

            <div class="row " >

                @foreach($projectsAll as $project)
                    <div class="col-lg-4 col-md-6 portfolio-item  mt-5 ">
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
            <div class="text-center justify-content-center align-items-center mt-5">


                    <button style="border: none"  class="bg-white">{{$projectsAll->appends($_GET)->links()}}</button>

            </div>


        </div>

    </div>





</section>
@stop

