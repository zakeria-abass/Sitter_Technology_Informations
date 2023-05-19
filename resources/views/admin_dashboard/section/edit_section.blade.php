@extends('admin_dashboard.layouts.master')

@section('title',__('admin.تعديل أقسام'))
@section('name-header',__('admin.تعديل أقسام'))

@section('content')


<!-- /row -->
<div class="row mt-3">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-body">

                    @if(session('edit'))
                    <div class="alert alert-success">
                        <strong>{{session('edit')}}</strong>
                    </div>
                    @endif

                <!-- Shopping Cart-->
                <form action="{{route('section.update',$sections->id)}}" method="post">
                    @csrf
                    @method('put')

                    <div class="row">
                        <!--------------------{ Name }------------------------------->
                        <div class="col-sm-6 mt-3">
                            <label>{{__('admin.أسم القسم انجليزي')}}</label>
                            <input type="text" class="form-control" name="name_en" value="{{$sections->name_en}}" >
                            <span class="text-danger">
                                @error('name_en')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label>{{__('admin.أسم القسم عربي')}}</label>
                            <input type="text" class="form-control" name="name_ar" value="{{$sections->name_ar}}" >
                            <span class="text-danger">
                                @error('name_ar')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>

                        <!--------------------{ About }------------------------------->
                        <div class="col-sm-6 mt-3">
                            <label>{{__('admin.عن القسم انجليزي')}}<span class="text-danger"> * {{__('admin.أختياري')}}</span> </label>
                            <input type="text" class="form-control" name="about_en" value="{{$sections->about_en}}" >

                        </div>
                        <div class="col-sm-6 mt-3">
                            <label>{{__('admin.عن القسم عربي')}}<span class="text-danger"> * {{__('admin.أختياري')}}</span> </label>
                            <input type="text" class="form-control" name="about_ar" value="{{$sections->about_ar}}">
                        </div>
                    </div>


                    <div class="col-sm-12 mt-3">
                                <button type="submit" class="btn btn-primary-gradient col-sm-12 font-weight-bold">{{__('admin.تعديل')}}</button>
                            </div>

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
@section('js')

@endsection
