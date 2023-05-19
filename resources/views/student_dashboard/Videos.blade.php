@extends('student_dashboard.layouts.master')

<?php
$Name='name_'.app()->currentLocale();

?>


@section('title',$name->$Name)


@section('content')


    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($videos)>0)
                        <div class="card-body row  justify-content-between">
                            <div class="col-sm-8   mt-5">
                            <iframe width="100%" height="400px" src="{{$videos[0]->src}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                            </div>


                            <div class="col-sm-4 mt-5  " style="overflow-y: scroll; height: 520px">

                            @foreach($videos as $video)
                                    <div class="mt-2 d-flex justify-content-between  vid">
                                        <iframe  width="300px" height="150px" src="{{$video->src}}" title="YouTube video player" ></iframe>
                                <div >
                                      <button type="button" class="btn btn-info"><i class="fa fa-eye"></i></button>

                                </div>
                            </div>
                            @endforeach
                        </div>






                    </div>
                      @endif
    <!-- row closed -->
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    <script>

        let listVideo = document.querySelectorAll(' .vid')
        let mainVideo = document.querySelector(' iframe')

        listVideo.forEach(video =>{
            video.onclick=()=>{
                    let src = video.children[0].getAttribute('src')
                    mainVideo.src = src ;
            }
        })

    </script>
@endsection
