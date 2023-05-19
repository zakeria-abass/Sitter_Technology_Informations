@extends('admin_dashboard.layouts.master')

@section('title',)
@section('name-header',__('admin.أضافة قسم'))



@section('content')


    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <!-- Shopping Cart-->
                    <form action="{{route('About.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <label>العنوان عربي</label>
                                <input type="text" class="form-control" name="title_ar" value="{{request()->title_ar}}" >
                                <span class="text-danger">
                                @error('name')
                                    {{'حقل الاسم مطلوب'}}
                                    @enderror
                            </span>
                            </div>
                            <div class="col-sm-6">
                                <label>العنوان انجليزي </label>
                                <input type="text" class="form-control" name="title_en" value="{{request()->title_en}}">
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <label>صوره </label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="imge">
                                <label class="custom-file-label " for="customFile">Choose file</label>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-6">
                                <label>التعبير عربي</label>
                                <textarea id="mytextarea" name="body_ar"></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label>التعبير انجليزي </label>
                                <textarea id="mytextarea" name="body_en"></textarea>
                            </div>
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
