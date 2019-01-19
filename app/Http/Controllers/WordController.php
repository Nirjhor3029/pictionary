<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Word;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class WordController extends Controller
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






    public function wordForm(){
        $topics = Topic::all();
        return view('admin.pages.word_form')->with('topics',$topics);
    }


    public function formSubmit(Request $request){
        //$image = $request->file('img')->store("word_images",["nir"] );

        $image = $request->file('img');
        $image_name = date('d.m.Y_h.i.s_').$request->title.$image->getClientOriginalName();
        $destinationPath = public_path("word_images");
        $img_URL = "public/word_images"."/".$image_name;
        $image->move($destinationPath,$image_name);
       // echo $status;
       // dd($image) ;


        $word = new Word();
        $word->topic_id = $request->topic_id;
        $word->title = $request->title;
        $word->img = $img_URL;
        $word->en_meaning = $request->en_meaning;
        $word->bn_meaning = $request->bn_meaning;
        $word->save();

        return back()->with('success',"successfully uploaded image");
    }
    public function edit_formSubmit(Request $request){

        //echo $request->id;
        //exit;

        $word = Word::where('id',$request->id)->first();

        $image = $request->file('img');
        if($image){
            $image_name = date('d.m.Y_h.i.s_').$request->title.$image->getClientOriginalName();
            $destinationPath = public_path("word_images");
            $img_URL = "public/word_images"."/".$image_name;
            $image->move($destinationPath,$image_name);

            $word->img = $img_URL;
        }

        $word->topic_id = $request->topic_id;
        $word->title = $request->title;
        $word->en_meaning = $request->en_meaning;
        $word->bn_meaning = $request->bn_meaning;
        $word->save();

        return back();
    }

    public function manageWords(){
        $words = Word::all();
        $topics = Topic::all();

        return view('admin.pages.manage_word')
            ->with('words',$words)
            ->with('topics',$topics);
    }

    public function deleteData($id){
        $word = Word::where('id',$id)->first();
        $word->delete();

        return Redirect::back();
        //echo $id;
    }
    public function editData($id){
        $word = Word::where('id',$id)->first();
        $topics = Topic::all();

        return view('admin.pages.word_form')
            ->with('word',$word)
            ->with('topics',$topics);

        // echo "edit".$id;
    }
    public function getData(){
        $words = Word::all();

        return DataTables::of($words)->make(true);
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
