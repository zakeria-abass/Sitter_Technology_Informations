<?php

namespace App\Http\Controllers\Lectures;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses;
use App\Models\Lectures\Lectures;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\ArrayList;
use PhpParser\Node\Expr\Array_;
use function PHPUnit\Framework\isEmpty;

class LecturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {



        $Timelecture = auth()->user()->cours()->with('lecture')->get();

        return view('admin_dashboard.coach.lecture',compact('Timelecture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'fff';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storelecture(Request $request, $id)
    {

        $request->validate([
            'time' => ['required']
        ]);


             $today = $request->today;
             $time = $request->time;
             for ($i = 0; $i < count($today); $i++) {

                 $data = [
                     'course_id' => $id,
                     'today' => $today[$i],
                     'time' => $time[$i],
                 ];

                 Lectures::create($data);
             }
             return redirect()->route('coach.index')->with('add', __('messages.Add successfully'));





    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Lectures\Lectures $lectures
     * @return \Illuminate\Http\Response
     */
    public function show(Lectures $lectures, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Lectures\Lectures $lectures
     * @return \Illuminate\Http\Response
     */
    public function edit(Lectures $lectures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lectures\Lectures $lectures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lectures $lectures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Lectures\Lectures $lectures
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lectures $lectures)
    {
        //
    }
}
