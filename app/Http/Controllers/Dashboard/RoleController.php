<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        if (!auth()->user()->can('roles index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $roles = Role::get();

        
        return view('back.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('roles create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $permissions = Permission::all();
        return view('back.roles.add', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('roles create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);
        
        // Permissions rola əlavə edilir
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with([
            'alertTitle' => 'Təbriklər',
            'alertContent' => 'Məlumatlar uğurla əlavə edildi.',
            'alertType' => 'success'
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('roles edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $permissions = Permission::orderBy('name')->get();
        $rolePermissions = $role->permissions()->pluck('permission_id');

        return view('back.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, Role $role)
    {
        abort_if(Gate::denies('roles edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Rolu yenilə
        $role->update([
            'name' => $request->name,
        ]);

        // Permission ID-lərini name-lərə çevir
        $permissionNames = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();

        // Permission-ları sinxronizasiya et
        $role->syncPermissions($permissionNames);

        return redirect()->route('roles.index')->with([
            'alertTitle' => 'Təbriklər',
            'alertContent' => 'Məlumatlar uğurla yeniləndi.',
            'alertType' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('roles delete'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $role->delete();
        return redirect()->route('roles.index')->with(['alertTitle' => 'Təbriklər', 'alertContent' => 'Silindi', 'alertType' => 'success']);
    }
}
