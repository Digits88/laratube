<?php

namespace App\Http\Controllers;

use App\Category;
use App\Childcategory;
use App\Series;
use App\Subcategory;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Series::all();
        return view('admins.dashboard.series.index')->withSeries($series);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $series = Series::all();
        return view('admins.dashboard.series.create')
            ->withCategories($categories)
            ->withSeries($series);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required',
            'subcategory_id' => 'required',
            'category_id' => 'required',
            'childcategory_id' => 'required',
            'isFeatured' => 'required'
        ]);

//        if ($validator->fails()) {
//            return back()
//                ->withInput()
//                ->withErrors($validator);
//        }

        $series = new Series();
        $series->name = $request->name;
        $series->category_id = $request->category_id;
        $series->subcategory_id = $request->subcategory_id;
        $series->childcategory_id = $request->childcategory_id;
        $series->isFeatured = $request->isFeatured === 'option1' ? 1 : 0;

        $series->save();

        return redirect()->route('index.main');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $series = Series::find($id);
        return view('admins.dashboard.series.show')->withSeries($series);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
