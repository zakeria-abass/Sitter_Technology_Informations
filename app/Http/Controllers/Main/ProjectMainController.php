<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\project_img;
use App\Models\Projects\Projects;
use Illuminate\Http\Request;

class ProjectMainController extends Controller
{
    /**
     * @page => {Project}
     *
     */
    public function project(Request $request)
    {
        $projectsAll=Projects::latest()->take(3)->paginate(3);
        return view('project',compact('projectsAll'));
    }

    /**
     * @page => {Project Details}
     *
     */
    public function details($id)
    {
        $details=Projects::where('id',$id)->first();
        return view('project_details',compact('details'));
    }



}
