<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;

class ArtikelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Artikel::all();
        return view('home', $data);
    }

    public function store(Request $request){
        $req = $request->all();

        Artikel::create($req);

        return redirect('/home');
    }

    public function edit($id)
    {
      $data['data'] = Artikel::find($id);

      return view('edit', $data);
    }

    public function update($id, Request $request)
    {
        $req = $request->except('_method', '_token', 'submit');

        $result = Artikel::where('id', $id)->update($req);

        return redirect('/home');
    }

    public function destroy($id)
    {
      $result = Artikel::find($id);
      $result->delete();

      return redirect()->back();
    }
}
