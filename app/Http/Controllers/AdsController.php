<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\AdRequest;

class AdsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ad::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * @param AdRequest $request
     * @return mixed
     */
    public function store(AdRequest $request)
    {
        $ad = Ad::create($request->validated());
        return $ad;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Ad::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ad::findOrFail($id)->delete();
        return '';
    }
}
