<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Model\Photo;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
       return view("admin.users.index" , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->get();
        return view("admin.users.create" , compact('roles'));
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

        User::create($input);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            return view("admin.users.show");
        }

       return view('admin.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::findOrFail($user->id);
        $roles = Role::select('id', 'name')->get();
        if ($user) {
            return view("admin.users.edit" , compact('user','roles'));
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
    public function update(UserEditRequest $request, User $user)
    {
        $user_input = $request->only(['name','email','role_id','is_active']);
        $user = User::findOrFail($user->id);
        $roles = Role::select('id', 'name')->get();

        // if request has file
        if ($request->hasFile('photo_id')) {
            $file = $request->file('photo_id');
            $name = time() . $file->getClientOriginalName();
            if($user->photo){
                $this->removeImage($user->photo->file );
            }
           $file->move('images' ,$name);
           $photo = Photo::create(['file' => $name ]);
           $user_input['photo_id'] = $photo->id;
        }

        $user->update($user_input);
        return redirect()->route('admin.users.index');
    }

    public function customValidate($request , $id){
        $validation = Validator::make($request->all(),[
            'emali' => Rule::unique('users', 'email')->ignore($id)
        ]);
        return $validation;
    }

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
    public function destroy($id)
    {
        //
    }
}
