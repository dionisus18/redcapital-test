<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRoles(['admin'])) {
            $archivos = FileManager::orderByDesc('created_at')->get();
        } else {
            $archivos = FileManager::orderByDesc('created_at')->where('user_id', auth()->user()->id)->get();
        }
        return view('fileManager.index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasRoles(['admin'])) {
            $usuarios = User::where('id', '>', 1)->get();
            return view('fileManager.create', compact('usuarios'));
        }
        return view('fileManager.create');
    }

    public function download($filename = '')
    {
        return Storage::download($filename);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'note' => 'string|max:255',
        ]);
        //return $request->all();
        // dd($request);
        $userid;
        if (auth()->user()->hasRoles(['admin'])) {
            $userid = $request->input('usuario');
        }else{
            $userid = auth()->user()->id;
        }
        FileManager::create([
            "name" => $request->file('file')->getClientOriginalName(),
            "path" => $request->file('file')->store('public'),
            "note" => $request->input('note') ?? '',
            "user_id" => $userid,
        ]);
        return back()->with('info','Subido con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function show(FileManager $fileManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function edit(FileManager $fileManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileManager $fileManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileManager $fileManager)
    {
        return $fileManager;
        $archivo = FileManager::find($fileManager->id);
        $archivo->delete();
        return redirect()->route('archivos.index')->with('info','Eliminado');
    }
}