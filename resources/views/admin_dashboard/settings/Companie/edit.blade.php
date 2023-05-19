
@extends('admin_dashboard.layouts.master')

@section('title',"تعديل شركات")
@section('name-header',"أضافة شركات")

@section('content')


<!-- /row -->
<div class="row mt-3">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="custom-file col-sm-12 text-center">
                    <img src="{{asset('assets_admin_dashboard/companies/'.$companie->logo)}}" width="100px" height="70px">

                </div>

                <!-- Shopping Cart-->
                <form class="mt-5" action="{{route('companie.update',$companie->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <!--------------------{ Name }------------------------------->
                        <div class="col-sm-6 mt-3">
                            <label>{{__('admin.أسم القسم انجليزي')}}</label>
                          <input type="text" class="form-control" name="name_en" value="{{$companie->name_en}}" >
                            <span class="text-danger">
                                @error('name_en')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label>{{__('admin.أسم القسم عربي')}}</label>
                            <input type="text" class="form-control" name="name_ar" value="{{$companie->name_ar}}" >
                            <span class="text-danger">
                                @error('name_ar')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>

                        <div class="col-sm-12 mt-3">

                            <div class="custom-file ">
                                <input type="file" class="custom-file-input" id="customFile" name="logo">
                                <label class="custom-file-label" for="customFile">Choose file</label>

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
</div>
</div>
<!-- main-content closed -->




@endsection

@section('js')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@stop
