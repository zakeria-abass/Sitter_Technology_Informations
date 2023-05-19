<?php
$name='name_'.app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title',"View All")
@section('name-header',__('admin.Add Couers'))

@section('content')


    <!-- /row -->
    <div class="row row-sm main-content-mail">
        <div class="col-lg-4 col-xl-3 col-md-12">
            <div class="card mg-b-20 mg-md-b-0">
                <div class="card-body">
                    <div class="main-content-left main-content-left-mail">
                        <a class="btn btn-main-primary btn-compose" href="" id="btnCompose">Compose</a>
                        <div class="main-mail-menu">
                            <nav class="nav main-nav-column mg-b-20">
                                <a class="nav-link active" href=""><i class="bx bxs-inbox"></i> Inbox <span>20</span></a>
                                <a class="nav-link active" href=""><i class="bx bx-send"></i> Sent Mail <span>8</span></a>
                            </nav>

                        </div><!-- main-mail-menu -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-9 col-md-12">
            <div class="card">
                <div class="main-content-body main-content-body-mail card-body">
                    <div class="main-mail-header">
                        <div>
                            <h4 class="main-content-title mg-b-5">Inbox</h4>
                            <p>You have {{auth()->user()->unreadNotifications->count()}} unread messages</p>
                        </div>
                        <div>
                            <span>1-50 of 1200</span>

                            @if(session('delete'))
                                <div class="alert alert-danger">
                                    <strong>{{session('delete')}}</strong>
                                </div>
                            @endif
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-secondary disabled" type="button"><i class="icon ion-ios-arrow-forward"></i></button> <button class="btn btn-outline-secondary" type="button"><i class="icon ion-ios-arrow-back"></i></button>
                            </div>
                        </div>
                    </div><!-- main-mail-list-header -->
                    <div class="main-mail-options">
                        <label class="ckbox"><input id="checked_all" type="checkbox"> <span></span></label>
                        <div class="btn-group">
                            <a href="" class="btn btn-light"><i class="bx bx-refresh"></i></a>
                            <a href="{{route('read_all')}}" class="btn btn-light "><i class="fa fa-eye"></i></a>

                            <form action="{{route('deletenotification')}}" method="post">

                                @csrf
                                @method('delete')
                                <button class="btn btn-light" {{auth()->user()->Notifications->count() <=0?'disabled':''}}><i class="bx bx-trash" ></i></button>
                        </div><!-- btn-group -->
                    </div><!-- main-mail-options -->
                    <div class="main-mail-list">


                        @foreach(auth()->user()->Notifications as $Notifications)

                            <div class="main-mail-item  {{ !$Notifications->unread()?'unread':'' }}">
                                <div class="main-mail-checkbox">
                                    <label class="ckbox"><input type="checkbox" name="checkbox[{{$Notifications->id}}]" value="{{$Notifications->id}}"> <span></span></label>
                                </div>
                                <div class="main-mail-star">
                                    <i class="typcn typcn-star text-warning"></i>
                                </div>
                                <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/5.jpg')}}"></div>
                                <div class="main-mail-body">
                                    <div class="main-mail-from ">
                                        {{__('admin.The Student is Registered:')}} <small class="text-success ">{{$Notifications->data['name_ar']}}</small>
                                    </div>
                                    <div class="main-mail-subject">
                                        <strong>{{__('admin.الدورات' )}} :<small class="text-primary">{{$Notifications->data['course_ar']}}</small></strong>
                                    </div>
                                </div>

                                <div class="main-mail-attachment">
                                    @if($Notifications->unread())
                                        <span class="badge badge-pill badge-danger">New</span>
                                    @endif
                                </div>
                                <div class="main-mail-date">
                                    11:30am
                                </div>
                            </div>

                            @endforeach
                            </form>

                    </div>
                    <div class="mg-lg-b-30"></div>

                </div>
            </div>
        </div>
        <div class="main-mail-compose">
            <div>
                <div class="container">
                    <div class="main-mail-compose-box">
                        <div class="main-mail-compose-header">
                            <span>New Message</span>
                            <nav class="nav">
                                <a class="nav-link" href=""><i class="fas fa-minus"></i></a> <a class="nav-link" href=""><i class="fas fa-compress"></i></a> <a class="nav-link" href=""><i class="fas fa-times"></i></a>
                            </nav>
                        </div>
                        <div class="main-mail-compose-body">
                            <div class="form-group">
                                <label class="form-label">To</label>
                                <div>
                                    <input class="form-control" placeholder="Enter recipient's email address" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Subject</label>
                                <div>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Write your message here..." rows="8"></textarea>
                            </div>
                            <div class="form-group mg-b-0">
                                <nav class="nav">
                                    <a class="nav-link" data-toggle="tooltip" href="" title="Add attachment"><i class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add photo"><i class="far fa-image"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add link"><i class="fas fa-link"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Emoticons"><i class="far fa-smile"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Discard"><i class="far fa-trash-alt"></i></a>
                                </nav><button class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->
    </div></div>
@endsection
@section('js')
    <script>
        $('#checked_all').on('change',function (){
            $('input[type=checkbox]').prop('checked',$(this).prop('checked'));
        })
    </script>
@endsection
