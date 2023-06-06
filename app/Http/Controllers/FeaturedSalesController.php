<?php

namespace App\Http\Controllers;

use App\Models\FeaturedSales;
use Illuminate\Http\Request;

class FeaturedSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('frontend.featuredSales');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeaturedSales  $featuredSales
     * @return \Illuminate\Http\Response
     */
    public function show(FeaturedSales $featuredSales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeaturedSales  $featuredSales
     * @return \Illuminate\Http\Response
     */
    public function edit(FeaturedSales $featuredSales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeaturedSales  $featuredSales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeaturedSales $featuredSales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeaturedSales  $featuredSales
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeaturedSales $featuredSales)
    {
        //
    }
}
