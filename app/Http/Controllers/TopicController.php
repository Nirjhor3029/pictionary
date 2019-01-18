<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function topicForm(){
        return view('admin.pages.topic_form');
    }


    public function formSubmit(Request $request){

        $topic = new Topic();
        $topic->title = $request->title;
        $topic->save();

        return Redirect::back()->with('msg',$topic);
    }
    public function edit_formSubmit(Request $request){

        //return $request;
        $topic = Topic::where('id',$request->id)->first();
        $topic->title = $request->title;
        $topic->save();

        //return $topic;
        return Redirect::to('/manage-topic');
    }

    public function manageTopis(){
            $topics = Topic::all();

        return view('admin.pages.manage_topic')
            ->with('topics',$topics);
    }

    public function deleteData($id){
        $topic = Topic::where('id',$id)->first();
        $topic->delete();

        return Redirect::back();
        //echo $id;
    }
    public function editData($id){
        $topic = Topic::where('id',$id)->first();
        return view('admin.pages.topic_form')
            ->with('topic',$topic);
       // echo "edit".$id;
    }
    public function getData(){
        $topics = Topic::all();

        return DataTables::of($topics)->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
    }
}
