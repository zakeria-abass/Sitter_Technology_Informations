<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title',"d")
@section('name-header',"d")

@section('content')

    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-between">
                        @foreach($videos as $video)
                        <div class="card bg-info">
                            <div class="card-body">
                                        <iframe  width="300px" height="150px" src="{{$video->src}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="card-footer ">
                               <form action="{{route('Update.Videos',$id)}}" method="post">
                                   @csrf
                                   @method('PUT')
                                   <input type="text"  hidden  name="id" value="{{$video->id}}">
                                   <input type="text" class="form-control " name="src" value="{{$video->src}}">
                                   <button class="btn btn-info col-sm-12 mt-2" type="submit">تعديل</button>
                               </form>

                                <form action="{{route('Destroy.Videos',$video->id)}}" method="post">
                                   @csrf
                                   @method('delete')
                                   <button class="btn btn-danger col-sm-12 mt-2" type="submit">حدف</button>
                               </form>
                            </div>
                        </div>
                        @endforeach

                    </div>



                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    </div>
    <!-- main-content closed -->



@endsection

