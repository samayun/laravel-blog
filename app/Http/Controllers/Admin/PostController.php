<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Model\Photo;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();
       return view("admin.posts.index" , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->get();
        return view("admin.posts.create" , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('photo_id')) {
           $file = $request->file('photo_id');
           $name = time() . $file->getClientOriginalName();
           $file->move('images' ,$name);
           $photo = Photo::create(['file' => $name ]);
           $input['photo_id'] = $photo->id;
        }

        Post::create($input);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserControllerer $Post)
    {
        $Post = Post::findOrFail($Post->id);
        if ($Post) {
            return view("admin.posts.show");
        }

       return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $Post)
    {
        $Post = Post::findOrFail($Post->id);
        $roles = Role::select('id', 'name')->get();
        if ($Post) {
            return view("admin.posts.edit" , compact('Post','roles'));
        }
        return view('admin.404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, Post $Post)
    {
       if ($request->password == "") {
        $user_input = $request->only(['name','email','role_id','is_active' ,'passsword']);
       }else{
            $user_input = $request->only(['name','email','role_id','is_active']);
       }
        $Post = Post::findOrFail($Post->id);
        $roles = Role::select('id', 'name')->get();

        // if request has file
        if ($request->hasFile('photo_id')) {
            $file = $request->file('photo_id');
            $name = time() . $file->getClientOriginalName();
            if($Post->photo){
                $this->removeImage($Post->photo->file );
            }
           $file->move('images' ,$name);
           $photo = Photo::create(['file' => $name ]);
           $user_input['photo_id'] = $photo->id;
        }

        $Post->update($user_input);
        return redirect()->route('admin.posts.index');
    }

    // public function customValidate($request , $id){
    //     $validation = Validator::make($request->all(),[
    //         'emali' => Rule::unique('posts', 'email')->ignore($id)
    //     ]);
    //     return $validation;
    // }

     public function removeImage($path){
        if(file_exists(public_path($path))){
            unlink(public_path($path));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $Post)
    {
        // Check exitance of the Post
        $Post = Post::findOrFail($Post->id);
        // is he has any photo uploaded will beremoved from storage
        if($Post->photo){
            $this->removeImage($Post->photo->file );
        }
        // Delete image from database's photos table also
        $Post->photo()->delete();

        // Post deleted from datavase
        $Post->delete();
        // Flashing delete message via Session
        Session::flash('deleted_user', 'Successfully delete') ;
         return redirect()->route('admin.posts.index');
    }
}
