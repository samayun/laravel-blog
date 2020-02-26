<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostEditRequest;
use App\Model\Photo;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
        $categories = Category::select('id', 'name')->get();
        return view("admin.posts.create" , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();
        // dd($input);
        if ($request->hasFile('photo_id')) {
           $file = $request->file('photo_id');
           $name = time() . $file->getClientOriginalName();
           $file->move('images' ,$name);
           $photo = Photo::create(['file' => $name ]);
           $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);
        // Post::create($input);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostControllerer $Post)
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
    public function edit(Post $post)
    {
        $post = Post::findOrFail($post->id);
        $categories = Category::select('id', 'name')->get();
        if ($post) {
            return view("admin.posts.edit" , compact('post','categories'));
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
    public function update(PostEditRequest $request, Post $post)
    {
       if ($request->photo_id == "") {
        $user_input = $request->only(['title','body','category_id'  ,'photo_id']);
       }else{
            $user_input = $request->only(['title','body','category_id']);
       }
        $found_post = Post::findOrFail($post->id);
        $categories = Category::select('id', 'name')->get();

        // if request has file
        if ($request->hasFile('photo_id')) {
            $file = $request->file('photo_id');
            $name = time() . $file->getClientOriginalName();
            if($found_post->photo){
                $this->removeImage($found_post->photo->file );
            }
           $file->move('images' ,$name);
           $photo = Photo::create(['file' => $name ]);
           $user_input['photo_id'] = $photo->id;
        }
       $auth_user = Auth::user()->posts()->whereId($post->id)->first();
        $auth_user->update($user_input);

        // $post->update($user_input);
        // $updated_post = Auth::user()->posts()->update($user_input)->where('id' , $post->id)->first();
        // $updated_post->dd();
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
    public function destroy(Post $post)
    {
        // Check exitance of the Post
        $found_post = Post::findOrFail($post->id);

        // is he has any photo uploaded will beremoved from storage
        if($found_post->photo){
            $this->removeImage($found_post->photo->file );
        }

        // Delete image from database's photos table also
        $found_post->photo()->delete();

        // Post deleted from database
        $found_post->delete();

        // Flashing delete message via Session & redirecting to /admin/posts
        Session::flash('deleted_user', 'Successfully delete') ;
     return redirect()->route('admin.posts.index');
    }
}
