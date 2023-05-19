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
                <form action="{{route('project.store')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 mt-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1" name="download" value="1">
                                <label class="custom-control-label" for="switch1">Permission to download a project</label>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label>  أسم المشروع انجليزي :</label>
                          <input type="text" class="form-control" name="name_en" value="{{old('name_en')}}" >
                            <span class="text-danger">
                                @error('name_en')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label>أسم المشروع عربي :</label>
                          <input type="text" class="form-control" name="name_ar" value="{{old('name_ar')}}" >
                            <span class="text-danger">
                                @error('name_ar')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>

                        <div class="col-sm-6 mt-3">
                            <label>  الطلاب المشاركون انجليزي :</label>
                            <input type="text" class="form-control" name="student_en" value="{{old('student_en')}}" >

                        </div>
                        <div class="col-sm-6 mt-3">
                            <label>الطلاب المشاركون عربي :</label>
                            <input type="text" class="form-control" name="student_ar" value="{{old('student_ar')}}" >
                        </div>

                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <label>رابط المشروع :<span class="text-danger"> * {{__('admin.أختياري')}}</span> </label>
                            <input type="text" class="form-control" name="url" value="{{old('url')}}">
                        </div>
                        <div class="col-sm-6">
                            <label>للغات البرمجة :</label>
                            <input type="text" class="form-control" name="progr_lang" value="{{old('progr_lang')}}">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <label>  صور لمشروع :</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="pic" >
                                <label class="custom-file-label " for="customFile">{{__('admin.أختر ملف')}}</label>
                            </div>

                            <span class="text-danger">
                                @error('pic')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label> <span class="text-danger"> * {{__('admin.أختياري')}}</span>     : Attachment </label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="attachment">
                                <label class="custom-file-label " for="customFile">{{__('admin.أختر ملف')}}</label>
                            </div>
                        </div>
                        </div>

                    </div>
                            <div class="row mt-2 p-2">
                                <div class="col-sm-6">
                                    <label>عن المشروع أنجليزي  :</label>
                                    <textarea class="mt-2" id="mytextarea" name="about_en">{{old('about_en')}}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label> عن المشروع عربي :</label>
                                    <textarea class="mt-2" id="mytextarea" name="about_ar">{{old('about_ar')}}</textarea>
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
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.0/tinymce.min.js" integrity="sha512-CpqBk+ddDL2iYxwLkBkqiL9HywSfSfVQdkZThgvEryhQXnGlrrp9foNf6K9hDM+QrNUyT9ElgRoKJLSnsLujow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    //fille uploud
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
