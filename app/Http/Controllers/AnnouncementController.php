<?php

namespace App\Http\Controllers;

use App\Announcement;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class AnnouncementController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all();
        return view('contents-admin.announcementlist', compact('announcements'));
    }

    public function addannouncement()
    {        
        return view('contents-admin.announcement');
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
        $announcement = new Announcement;

        $announcement->user_id = Input::get('user_id');
        $announcement->title = Input::get('title');
        $announcement->message = Input::get('message');
        $announcement->start_date = Input::get('start_date');
        $announcement->end_date = Input::get('end_date');
        $is_enabled = Input::get('is_enabled');
        if(empty($is_enabled))
            $is_enabled = 0;
        $announcement->is_enabled = $is_enabled;
        $anounncement->modified_by = Auth::user();
        
        $announcement->save();

        $announcements = Announcement::all();
        return view('contents-admin.announcementlist', compact('announcements'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);
        return view('contents-admin.announcement', compact('announcement'));
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
        //Announcement::find($id)->update($request->all());
        $announcement = Announcement::find($id);

        $announcement->user_id = Input::get('user_id');
        $announcement->title = Input::get('title');
        $announcement->message = Input::get('message');
        $announcement->start_date = Input::get('start_date');
        $announcement->end_date = Input::get('end_date');
        $is_enabled = Input::get('is_enabled');
        if(empty($is_enabled))
            $is_enabled = 0;
        $announcement->is_enabled = $is_enabled;
        $anounncement->modified_by = Auth::user();
        
        $announcement->save();

        $announcements = Announcement::all();
        return view('contents-admin.announcementlist', compact('announcements'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Announcement::find($id)->delete();
        return Redirect::to('announcement');
        /*$announcements = Announcement::all();
        return view('contents-admin.announcementlist', compact('announcements'));*/
    }
}
