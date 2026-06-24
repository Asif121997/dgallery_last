<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use DB;

class UserController extends Controller
{
    public function index(){

        if (!auth()->user()->can('users index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = User::with('roles')->orderby('id','desc')->get();

        return view('back.users.index',compact('rows'));
    }

    public function create(){

        if (!auth()->user()->can('users create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $permissions = Permission::orderBy('name')->get();

        return view('back.users.add',compact('permissions'));
    }

    public function store(Request $request){
        if (!auth()->user()->can('users create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        if($request->password  == $request->password_confirmation){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:6',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            // Əgər permission-lar gəlirsə əlavə et
            if ($request->has('permissions')) {
                $user->syncPermissions($request->permissions);
            }

            return redirect()->route('users.index')->with([
                'success' => 'Success',
                'text' => 'User created',
            ]);
        }else{
            return redirect()->back()->with([
                'error' => 'Error',
                'text' => 'Password and Password Repeat are not the same',
            ])->withInput();
        }
    }

    public function edit(User $user){

        if (!auth()->user()->can('users edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $permissions = Permission::orderBy('name')->get();
        $userPermissions = $user->getAllPermissions();
        return view('back.users.edit',compact('user','permissions','userPermissions'));

    }

    public function update(User $user,Request $request){
        if (!auth()->user()->can('users edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password and $request->password == $request->password_confirmation){
            $user->password = bcrypt($request['password']);
        }

        $user->save();
        DB::table('model_has_permissions')->where('model_id',$user->id)->delete();
        if ($request->has('permissions')) {
            for($i = 0; $i < count($request->permissions); $i++){
                DB::table('model_has_permissions')->insert([
                    'permission_id' => $request->permissions[$i],
                    'model_type' => 'App\Models\User',
                    'model_id' => $user->id,
                ]);
            }
        } 

        return redirect()->route('users.index')->with([
            'success' => 'Success',
            'text' => 'User updated',
        ]);

    }


    public function destroy(User $user)
    {
        if (!auth()->user()->can('users delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $user->delete();
        return redirect()->route('users.index')->with([
            'success' => 'Success',
            'text' => 'User successfully deleted.',
        ]);
    }
}
