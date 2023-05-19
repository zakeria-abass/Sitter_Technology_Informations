@extends('student_dashboard.layouts.master')

@section('title',__('admin.Student Profile'))


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
                                    <div class="card-body text-center ">
                                        @if(auth()->guard('student')->user()->imge)
                                        <img src="{{asset("assets_admin_dashboard/img/user/".auth()->guard('student')->user()->imge)}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px">
                                        @else
                                            <img src="{{asset("assets_admin_dashboard/img/user/user_deflide.png")}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">

                                        @endif
                                            <h5 style="font-family: Cairo" class="my-3">{{auth()->guard('student')->user()->$name}}</h5>
                                        <p class="text-muted mb-1">{{auth()->guard('student')->user()->email}}</p>
                                            <form action="{{route('profile.update',auth()->guard('student')->user()->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                                <main class="custom-file  col-sm-12 mt-4">
                                                    <input type="file" class="custom-file-input" id="customFile" name="imge">
                                                    <label class="custom-file-label " for="customFile">{{__('admin.Choose Imge')}}</label>
                                                </main>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">

                                            <div class="row">
                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Name  Arabic')}}</label>
                                                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{auth()->guard('student')->user()->name_ar}}">
                                                </main>
                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Name  English')}}</label>
                                                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{auth()->guard('student')->user()->name_en}}">
                                                </main>
                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Email :')}}</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{auth()->guard('student')->user()->email}}">
                                                </main>

                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Number Collegiate :')}}</label>
                                                    <input type="text" class="form-control @error('n_university') is-invalid @enderror" name="n_university" value="{{auth()->guard('student')->user()->n_university}}">
                                                </main>

                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Collegiate Specialty :')}}</label>
                                                    <input type="text" class="form-control @error('specialty') is-invalid @enderror" name="specialty" value="{{auth()->guard('student')->user()->specialty}}">
                                                </main>

                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Phone :')}}</label>
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{auth()->guard('student')->user()->phone}}">
                                                </main>


                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('admin.Educational Level :')}}<span class="text-danger">*</span></label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input @error('stage') is-invalid @enderror" id="customRadio" {{auth()->guard('student')->user()->stage ==="طالب"?'checked':''}}  name="stage" value="طالب" >
                                                        <label class="custom-control-label" for="customRadio">{{__('admin.Student')}}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input @error('stage') is-invalid @enderror" id="customRadio2" {{auth()->guard('student')->user()->stage ==="خريج"?'checked':''}}  name="stage" value="خريج"  >
                                                        <label class="custom-control-label" for="customRadio2">{{__('admin.Graduate')}}</label>
                                                    </div>
                                                </main>
                                                <main class="col-sm-6 mt-2">
                                                    <label>{{__('ADMIN.Gender :')}}<span class="text-danger">*</span></label><br>
                                                    <div class="custom-control custom-radio custom-control-inline" >
                                                        <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror"  id="customRadio3" name="gender" {{auth()->guard('student')->user()->gender ==="دكر"?'checked':''}} value="دكر"  >
                                                        <label class="custom-control-label" for="customRadio3">{{__('admin.Male')}}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="customRadio4" name="gender" {{auth()->guard('student')->user()->gender ==="انثي"?'checked':''}} value="انثي"   >
                                                        <label class="custom-control-label" for="customRadio4">{{__('admin.Female')}}</label>
                                                    </div>
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
                                                <main class="col-sm-12 mt-2">
                                                    <input type="checkbox" class="form-check-input" onclick="myFunction()"
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
