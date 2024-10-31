<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();
        $data['success'] = true;
        $data['message'] = 'data berhasil ditemukan';
        $data['result'] = $film;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validate = $request->validate([
        'name' => 'required'
       ]);

       $result = Film::create($validate);
       if($result){
            $data['success'] = true;
            $data['message'] = 'film berhasil ditambahkan';
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $film = Film::find($id);
        if($film){
            $data['success'] = true;
            $data['message'] = 'data berhasil ditemukan';
            $data['result'] = $film;
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = 'data tidak ditemukan';
            $data['result'] = $film;
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
