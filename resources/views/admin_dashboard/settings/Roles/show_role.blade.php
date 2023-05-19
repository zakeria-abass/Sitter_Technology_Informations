@extends('admin_dashboard.layouts.master')

@section('title',)
@section('name-header',' عرض صلاحيات  ')



@section('content')


    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered mt-4">

                        <tbody>

                        <?php $i=1 ?>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$role->name}}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info"
                                            data-toggle="dropdown" type="button">Actions <i class="fas fa-caret-down ml-1"></i></button>
                                    <div class="dropdown-menu tx-13">

                                        @if(auth()->user()->role->abilites()->where('code','delet_role')->exists())
                                        <a class="dropdown-item"  data-effect="effect-scale" data-toggle="modal" href="#delete{{$role->id}}">{{__('admin.حذف')}}</a>
                                        @endif

                                        @if(auth()->user()->role->abilites()->where('code','edit_role')->exists())
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item"  href="{{route('role.edit',$role->id)}}">{{__('admin.تعديل')}}</a>
                                        @endif

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item"  data-effect="effect-scale" data-toggle="modal"  href="#ability{{$role->id}}">عرض القدرات</a>
                                    </div>
                                </div>

                            </td>

                        </tr>

                        <!--  modal Show Ability -->
                        <div class="modal" id="ability{{$role->id}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"> القدرات </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                                <div class="row ">
                                                    @foreach($abilits as $abilit)
                                                        @if($role->abilites->find($abilit->id))
                                                    <div class="col-sm-6 text-center " style="border: 1px solid rgba(0,0,0,0.35)">{{$abilit->name}}</div>
                                                        @endif
                                                    @endforeach
                                                </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Show Ability  -->

                         @if($role->name !="Super Admin")
                        <!-- Delete Roles -->
                        <div class="modal" id="delete{{$role->id}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"> القدرات </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <label>هل انتا متأكد من حدف الصالحية ؟</label>
                                        <input  disabled type="text" class="form-control" name="section_name" value="{{$role->name}}" required>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('role.destroy',$role->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn ripple btn-danger" type="submit">{{__('admin.حذف')}}</button>
                                        </form>
                                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{__('admin.الغاء')}}</button>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Delete Roles  -->
                @endif
                        @endforeach
                        </tbody>
                    </table>

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

