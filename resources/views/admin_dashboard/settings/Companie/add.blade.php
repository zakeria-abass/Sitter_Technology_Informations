@extends('admin_dashboard.layouts.master')

@section('title',"أضافة شركات")
@section('name-header',"أضافة شركات")

@section('content')


<!-- /row -->
<div class="row mt-3">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-body">

                <!-- Shopping Cart-->
                <form action="{{route('companie.store')}}" method="post" enctype="multipart/form-data">
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
                        <div class="col-sm-12 mt-3">

                            <div class="custom-file">
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
