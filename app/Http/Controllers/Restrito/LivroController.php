<?php

namespace App\Http\Controllers\Restrito;

use App\DataTables\LivroDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LivroController extends Controller
{

    public function index(LivroDataTable $livroDataTable)
    {
        return $livroDataTable->render('restrito.livro.index');
    }

    public function create()
    {
        return view('restrito.livro.form');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
