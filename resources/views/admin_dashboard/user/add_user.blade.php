@extends('admin_dashboard.layouts.master')

@section('title',__('admin.Add User'))
@section('name-header',__('admin.Add User'))



@section('content')


    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <form action="{{route('user.store')}}" method="post">
                    @csrf

                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <i class="mdi mdi-dots-horizontal text-gray"></i>

                        <div>
                            <select class="form-control " name="type" >
                                <option value="" selected disabled>-- {{__('admin.مقدم الدورة انجليزي')}} --</option>
                                <option value="1">أدمن</option>
                                <option value="2">مدرب</option>
                            </select>
                            <span class="text-danger">
                                @error('type')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                    </div>

                </div>
                <div class="card-body">

                          <div class="row">
                              <div class="col-sm-4">
                                  <label>{{__('admin.Name User')}}</label>
                                  <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{old('name_en')}}" PLACEHOLDER="{{__('admin.Enter The Username')}}">
                             <span class="text-danger">
                                 @error('name_en')
                                  {{$message}}
                                 @enderror
                             </span>
                              </div>

                              <div class="col-sm-4">
                                  <label>{{__('admin.Name User')}}</label>
                                  <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{old('name_ar')}}" PLACEHOLDER="{{__('admin.Enter The Username')}}">
                                  <span class="text-danger">
                                 @error('name_ar')
                                      {{$message}}
                                      @enderror
                             </span>
                              </div>

                              <div class="col-sm-4">
                                  <label>{{__('admin.E-mail')}}</label>
                                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" PLACEHOLDER="{{__('admin.Enter The Email')}}">
                             <span class="text-danger">
                                 @error('email')
                                  {{$message}}
                                 @enderror
                             </span>
                              </div>

                          </div>
                          <div class="row mt-3">
                              <div class="col-sm-6">
                                  <label>{{__('admin.Password')}}</label>
                                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}"  PLACEHOLDER="{{__('admin.Enter The Password')}}">
                              <span class="text-danger">
                                  @error('password')
                                   {{$message}}
                                  @enderror
                              </span>
                              </div>

                              <div class="col-sm-6">
                                  <label>{{__('admin.Password Confirmation')}}</label>
                                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" value="{{old('password_confirmed')}}" PLACEHOLDER="{{__('admin.Enter The Password Confirmed')}}">
                             <span class="text-danger">
                                 @error('password')
                                  {{$message}}
                                 @enderror
                             </span>
                              </div>
                          </div>
                           <button type="submit" class="btn btn-primary-gradient mt-4 w-100">{{__('admin.أضافة')}}</button>
                      </form>
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


