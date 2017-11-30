<?php

namespace App\Http\Controllers;

use App\News;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('contents-admin.news', compact('news'));
    }

    public function addnews()
    {
        $news = News::all();
    	$func = "add";
        return view('contents-admin.news', compact('news', 'func'));
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
        $news = new News;

        $news->date = Input::get('date');
        $news->headline = Input::get('headline');
        $news->content = Input::get('content');
        $news->modified_by = Auth::user();

        $news->save();

        return Redirect::to('newsadmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $search
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
    	$news = News::where('headline', 'like', '%'.$search.'%')->orwhere('content', 'like', '%'.$search.'%')->get();
    	return view('contents-admin.news', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$news = News::all();
        $result = News::find($id);
        $func = "edit";
        return view('contents-admin.news', compact('news', 'result', 'func'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $news = News::all();
        $result = News::find($id);
        $func = "delete";
        return view('contents-admin.news', compact('news', 'result', 'func'));
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
        $news = News::find($id);

        $news->date = Input::get('date');
        $news->headline = Input::get('headline');
        $news->content = Input::get('content');
        $news->modified_by = Auth::user();

        $news->save();

        return Redirect::to('newsadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	News::find($id)->delete();
    	return Redirect::to('newsadmin');
    }
}
