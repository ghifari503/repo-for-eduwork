<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs = catalog::with('books')->get();

        return view ('admin.catalog.index', compact('catalogs'));
    }

    public function test_spatie()
    {
        // $role = Role::create(['name' => 'librarian']);
        // $permission = Permission::create(['name' => 'index catalog']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $user = auth()->user();
        // $user->assignRole('librarian');
        // return $user;

        // $user = User::where('id', 1)->first();
        // $user->assignRole('librarian');
        // return $user;

        // $user = User::with('roles')->get();
        // return $user;

        // $user = User::where('id', 1)->first();
        // $user->removeRole('librarian');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'      =>['required'],
        ]);

        catalog::create($request->all());

        return redirect('catalogs');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $catalog)
    {

        return view ('admin.catalog.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalog $catalog)
    {
        $this->validate($request,[
            'name'      =>['required'],
        ]);

        $catalog->update($request->all());

        return redirect('catalogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function delete(Catalog $catalog)
    {
        $catalog->delete();

        return redirect('catalogs');
    }

}
