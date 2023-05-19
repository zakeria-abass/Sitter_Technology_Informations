<?php

namespace App\Http\Controllers\Admin\VideoCourse;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses;
use App\Models\Courses\VideosCourses;
use App\Models\Lectures\Lectures;
use App\Models\User;
use App\Traits\ShowVideosTrait;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    use ShowVideosTrait;

    public  function index($id){

        $NameCourse=Courses::where('id',$id)->select('id','name_ar','name_en')->first();

            return view('admin_dashboard.coach.EventsCourse',compact('NameCourse'));

    }



    /**
     * StoreVideos
     * ADD Video
     * {{$id}}
     */
    public  function StoreVideos(Request $request, $id){

        $request->validate([
            'src' => ['required']
        ]);


        $src = $request->src;
        for ($i = 0; $i < count($src); $i++) {

            $data = [
                'courses_id' => $id,
                'src' => $src[$i],
            ];

            VideosCourses::create($data);
        }
      return redirect()->back()->with('add',__('messages.Add successfully'));
    }



    /**
     * ShowVideos
     * Show Video
     * {{$id}}
     */
    public  function ShowVideos($id){

        //===== Trait ==> ShowVideos
        $videos= $this->view($id);

        return view('admin_dashboard.coach.ShowVideos',compact('videos','id'));
    }


    /**
     * updateVideos
     * Show Video
     * {{$id}}
     */

    public function UpdateVideos(Request $request,$id)
    {

        VideosCourses::where('id',$request->id)->update([

            'src'=>$request->src,
        ]);
        return back();
    }


    /**
     * DestroyVideos
     * Destroy Video
     * {{$id}}
     */

    public function DestroyVideos($id)
    {

        VideosCourses::where('id',$id)->delete();
        return back();
    }
}
