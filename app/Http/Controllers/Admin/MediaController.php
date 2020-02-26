<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Photo;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('created_at' , 'desc')->get();
        return view("admin.media.index" , compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            // $file = $request->file('file');
            foreach ($request->file as $file) {

                $name = time() . $file->getClientOriginalName() ;

                $file->move('images' , $name);

                Photo::create(['file'=>$name] );

            }

        }
        $photos = Photo::orderBy('id' , 'desc')->get();
        return view("admin.media.index" , compact('photos'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $found_photo = Photo::findOrFail($id);
        unlink(public_path() .'/images/' . $$found_photo->file);
        $found_photo->delete();
        $photos = Photo::all();
        return view("admin.media.index" , compact('photos'));
    }
}
