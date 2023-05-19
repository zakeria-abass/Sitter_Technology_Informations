@extends('admin_dashboard.layouts.master')

@section('title',__('admin.Profile'))
@section('name-header',__('admin.Profile'))


<?php
$name='name_'.app()->currentLocale();
?>
@section('content')


    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <section >
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        @if(auth()->user()->imge)
                                        <img src="{{asset("assets_admin_dashboard/img/user/".auth()->user()->imge)}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px">
                                        @else
                                            <img src="{{asset("assets_admin_dashboard/img/user/user_deflide.png")}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">

                                        @endif
                                            <h5 style="font-family: Cairo" class="my-3">{{auth()->user()->$name}}</h5>
                                        <p class="text-muted mb-1">{{auth()->user()->email}}</p>
                                        <a class="text-muted mb-4 mt-"  data-effect="effect-scale" data-toggle="modal"  href="#ability">{{__('admin.View Powers')}}</a>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <form action="{{route('profileUsers.update',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Name  Arabic')}}</label>
                                                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{auth()->user()->name_ar}}">
                                                </main>
                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Name  English')}}</label>
                                                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{auth()->user()->name_en}}">
                                                </main>
                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Email :')}}</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{auth()->user()->email}}">
                                                </main>



                                                    <main class="custom-file  col-sm-6 mt-4">
                                                        <input type="file" class="custom-file-input" id="customFile" name="imge">
                                                        <label class="custom-file-label " for="customFile">{{__('admin.Choose Imge')}}</label>
                                                    </main>


                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Password :')}}</label>
                                                    <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{old('password')}}"  PLACEHOLDER="{{__('admin.Password :')}}">
                                                    <span class="text-danger">
                                                    @error('password')
                                                        {{$message}}
                                                        @enderror
                                                     </span>
                                                   </main>
                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Password Confirmation :')}}</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" value="{{old('password_confirmed')}}" PLACEHOLDER="{{__('admin.Password Confirmation :')}}">
                                                    <span class="text-danger">
                                                     @error('password')
                                                        {{$message}}
                                                        @enderror
                                                          </span>
                                                    </main>
                                                <main class="col-sm-12 mt-3 ml-4 ">
                                                    <input type="checkbox" class="form-check-input " onclick="myFunction()"
                                                           id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">{{__('admin.Show Password')}}</label>
                                                </main>



                                            </div>

                                            <button type="submit" class="btn btn-primary mt-3  col-sm-12">{{__('admin.Edit')}}   <i class="fa fa-edit mr-2 ml-2"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

            </div>
        </div>
    </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->


    <!--  modal Show Ability -->
    <div class="modal" id="ability">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"> القدرات </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="row ">
                        @foreach($roles->where('id',auth()->user()->role_id) as $role)
                            @foreach($abilits as $abilit)
                            @if($role->abilites->find($abilit->id))
                                <div class="col-sm-6 text-center " style="border: 1px solid rgba(0,0,0,0.35)">{{$abilit->name}}</div>
                            @endif
                            @endforeach
                        @endforeach
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- End Show Ability  -->
@endsection
@section('js')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        //fille uploud
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
