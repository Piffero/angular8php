<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $emp = Task::all();
      return json_encode($emp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $emp = new Task;
      $emp->TasktName = $request->input('TasktName');
      $emp->TaskDescription = $request->input('TaskDescription');
      $emp->TaskTime = $request->input('TaskTime');
      $emp->save();
      return json_encode('{"success": "true"}');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $article = Task::find($id); //id comes from route
       if( $article ){
           return json_encode($article);
       }
       return return json_encode('{"success": "false", "message": "Task Not found"}'); // temporary error
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $emp = Task::find($id);
      $emp->TasktName = $request->input('TasktName');
      $emp->TaskDescription = $request->input('TaskDescription');
      $emp->TaskTime = $request->input('TaskTime');
      $emp->save();
      return json_encode('{"success": "true"}');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Done(Request $request, $id)
    {
      $emp = Task::find($id);
      $emp->TaskDone = $request->input('TaskDone');
      $emp->save();
      return json_encode('{"success": "true"}');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $emp = Task::findOrfail($id);
        if($emp->delete()){
            return  json_encode($emp);
        }
        return json_encode('{"success": "false", "message": "Error while deleting"}');;
    }
}
