<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskUser;
use App\Http\Requests;

class TaskUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = TaskUser::all();
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
        $emp = new TaskUser();
        $emp->TasktId = $request->input('TasktId');
        $emp->TaskUserId = $request->input('TaskUserId');
        $emp->TaskDone = $request->input('TaskDone');
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
        $article = TaskUser::find($id); //id comes from route
        if( $article ){
            return json_encode($article);
        }
        return json_encode('{"success": "false", "message": "Task Not found"}'); // temporary error
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
        $emp = TaskUser::find($id);
        $emp->TasktId = $request->input('TasktId');
        $emp->TaskUserId = $request->input('TaskUserId');
        $emp->TaskDone = $request->input('TaskDone');
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
        $emp = TaskUser::find($id);
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
        $emp = TaskUser::findOrfail($id);
        if($emp->delete()){
            return  json_encode($emp);
        }
        return json_encode('{"success": "false", "message": "Error while deleting"}');;
    }
}
