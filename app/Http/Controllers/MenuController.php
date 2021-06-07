<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use App\Models\Route;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        // $roles = Role::whereColumn('id', '>', 1);
        $submenus = Route::all();
        return view('menu.create', compact('roles'),compact('submenus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $localErrors = false;
        try {
            $menu = Menu::create([
                "name" => $request->input('name'),
                "role_id" => $request->input('rol'),
            ]);
        } catch (\Illuminate\Database\QueryException $exception) {
            $localErrors = true;
        }
        if (!$localErrors) {
            $menu->routes()->attach($request->input('submenus'));
            return back()->with('info', 'Nuevo Menu Creado');
        }
        return back()->with('error', 'El menu elegido para el rol ya existe');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Menu $menu)
    {
        dd($menu);
        $menu->routes()->detach();
        $menu->delete();
        return redirect()->route('menus.index');
    }
}