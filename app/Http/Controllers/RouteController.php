<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRouteRequest;

class RouteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','roles']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submenus = Route::all();
        return view('submenus.index', compact('submenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('submenus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRouteRequest $request)
    {
        Route::create([
            "name" => $request->input('name'),
            "route" => $request->input('route'),
        ]);
        //$validated = $request->validated();
        return back()->with('info', 'Nuevo SubMenu Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Route  $submenu
     * @return \Illuminate\Http\Response
     */
    public function show(Route $submenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Route  $submenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $submenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Route  $submenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $submenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Route  $submenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $submenu)
    {
        $submenu->menus()->detach();
        $submenu->delete();
        return redirect()->route('submenus.index');
    }
}