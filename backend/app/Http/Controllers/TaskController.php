<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;
use App\TaskUser;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $emp = Task::listAll();
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
      $emp->TaskName = $request->input('TaskName');
      $emp->TaskPriority = $request->input('TaskPriority');
      $emp->TaskDescription = $request->input('TaskDescription');
      $emp->TaskTime = date('d/m/Y H:i:s');
      $emp->save();
      
      $arrDevs = explode(',', $request->input('TaskUsers'));
      foreach ($arrDevs as $devId) {
          $emb = new TaskUser;
          $emb->TaskId = $emp->id;
          $emb->TaskUserId = $devId;
          $emb->save();
      }
      
      $data['taskList'] = $emp->listAll();      
      foreach ($data['taskList'] as $key => $row) {
          $arrDevs2 = $emb->getDevOfTask($row['id']);
          $data['taskList'][$key]['TaskDevs'] = $arrDevs2->toArray();
      }
      
      return view('cardtask', $data);
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
       return json_encode('{"success": "false", "message": "Task Not found"}'); // temporary error
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
      
      $data['taskList'] = $emp->listAll();
      foreach ($data['taskList'] as $key => $row) {
          $emb = new TaskUser;
          $arrDevs2 = $emb->getDevOfTask($row['id']);
          $data['taskList'][$key]['TaskDevs'] = $arrDevs2->toArray();
      }
      
      return view('cardtask', $data);
      
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
        $emp->delete();
        
        $data['taskList'] = $emp->listAll();
        foreach ($data['taskList'] as $key => $row) {
            $emb = new TaskUser;
            $arrDevs2 = $emb->getDevOfTask($row['id']);
            $data['taskList'][$key]['TaskDevs'] = $arrDevs2->toArray();
        }
        
        return view('cardtask', $data);
        
    }
}
