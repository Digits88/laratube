<?php

namespace App\Http\Controllers;

use App\Category;
use App\Childcategory;
use App\Series;
use App\Subcategory;
use App\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Validator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('admins.dashboard.videos.index')->withVideos($videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $series = Series::all();
        return view('admins.dashboard.videos.create')
            ->withSeries($series);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:videos|max:255',
            'description' => 'bail|required',
            'series_id' => 'required',
            'video' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        //Storage::disk('ftp')->put('file.jpg');
        $exists = Storage::disk('ftp')->exists(str_slug($request->title) . ".". $request->file('video')->getClientOriginalExtension());
        if($exists)
        {
            Session::flash('danger', 'This title is already exists');
            return back()->withInput();
        }
        else
        {
            $video = new Video();
            $video->title = $request->title;
            $video->description = $request->description;
            $video->series_id = $request->series_id;
            $video->slug = str_slug($request->title);
            $video->save();
            $path = Storage::disk('ftp')->putFileAs('videos', $request->file('video'),
                str_slug($request->title) . ".". $request->file('video')->getClientOriginalExtension());
        }
//        $converted_res = ($exists) ? 'true' : 'false';
//
        return $path;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        // $urls = Storage::url('videos/' . $video->path);
        $v = Storage::disk('ftp')->get('videos/' . $video->path);
        Storage::disk('local')->put($video->path, $v);

        $url = Storage::url($video->path);
//        return view('admins.dashboard.videos.show')->withVideo($video);
        return $url;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
