@extends('admin_dashboard.layouts.master')

@section('title',__('admin.أضافة قسم'))
@section('name-header',__('admin.أضافة قسم'))

@section('content')


<!-- /row -->
<div class="row mt-3">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-body">

                <!-- Shopping Cart-->
                <form action="{{route('section.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <!--------------------{ Name }------------------------------->
                        <div class="col-sm-6 mt-3">
                            <label>{{__('admin.أسم القسم انجليزي')}}</label>
                          <input type="text" class="form-control" name="name_en" value="{{request()->name_en}}" >
                            <span class="text-danger">
                                @error('name_en')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label>{{__('admin.أسم القسم عربي')}}</label>
                            <input type="text" class="form-control" name="name_ar" value="{{request()->name_ar}}" >
                            <span class="text-danger">
                                @error('name_ar')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>

                        <!--------------------{ About }------------------------------->
                        <div class="col-sm-6 mt-3">
                            <label>{{__('admin.عن القسم انجليزي')}}<span class="text-danger"> * {{__('admin.أختياري')}}</span> </label>
                            <input type="text" class="form-control" name="about_en" value="{{request()->about_en}}" >

                        </div>
                        <div class="col-sm-6 mt-3">
                            <label>{{__('admin.عن القسم عربي')}}<span class="text-danger"> * {{__('admin.أختياري')}}</span> </label>
                            <input type="text" class="form-control" name="about_ar" value="{{request()->about_ar}}">
                        </div>
                    </div>
                            <div class="col-sm-12 mt-3">
                                <button type="submit" class="btn btn-primary-gradient col-sm-12 font-weight-bold">{{__('admin.أضافة')}}</button>
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

