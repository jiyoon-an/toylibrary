<?php

namespace App\Http\Controllers;

use App\Message;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class CustomerSupportController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::where('user_id', null)->get();
        return view('contents-admin.customersupport', compact('messages'));
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
    public function store(Request $request, $user_id, $thread_id, $category_id)
    {
        $message = new Message;

        $message->user_id = $user_id;
        $message->message_thread_id = $thread_id;
        $message->message_category_id = $category_id;
        $message->message = Input::get('message');
        $message->is_read = 0;
        $message->modified_by = Auth::user();

        $message->save();

        return Redirect::to('customersupport');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        if($category==='sent') {
            $messages = Message::where('member_id', null)->get();
        } else {
            $messages = Message::leftjoin('message_categories', 'messages.message_category_id', '=', 'message_categories.id')->where('messages.user_id', null)->where('message_categories.category_name', $category)->get();    
        }
        
        return view('contents-admin.customersupport', compact('messages', 'category'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showresult($category, $search)
    {
        if($category==='sent'){
            $messages = Message::leftjoin('message_threads','messages.message_thread_id', '=', 'message_threads.id')->where('messages.member_id', null)->leftjoin('users', 'messages.user_id', '=', 'users.id')->where(function($query) use ($search) { $query->where('users.username','like', '%'.$search.'%')->orwhere('message_threads.title','like', '%'.$search.'%');
                })->get();
        } else {
            if($category==="all") {
                $messages = Message::leftjoin('message_categories', 'messages.message_category_id', '=', 'message_categories.id')->leftjoin('message_threads','messages.message_thread_id', '=', 'message_threads.id')->where('messages.user_id', null)->leftjoin('members', 'messages.member_id', '=', 'members.id')->leftjoin('users', 'members.user_id', '=', 'users.id')->where(function($query) use ($search) { $query->where('users.username','like', '%'.$search.'%')->orwhere('message_threads.title','like', '%'.$search.'%');})->get();
            } else {
                $messages = Message::leftjoin('message_categories', 'messages.message_category_id', '=', 'message_categories.id')->leftjoin('message_threads','messages.message_thread_id', '=', 'message_threads.id')->where('messages.user_id', null)->leftjoin('members', 'messages.member_id', '=', 'members.id')->leftjoin('users', 'members.user_id', '=', 'users.id')->where('message_categories.category_name', $category)->where(function($query) use ($search) { $query->where('users.username','like', '%'.$search.'%')->orwhere('message_threads.title','like', '%'.$search.'%');
                })->get();
            }
        }
        
        return view('contents-admin.customersupport', compact('messages', 'search', 'category'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showthread($category, $search, $thread_id)
    {
        if($search==="null"){
            $search="";
        }
        if($category==='sent'){
            $messages = Message::leftjoin('message_threads','messages.message_thread_id', '=', 'message_threads.id')->where('messages.member_id', null)->leftjoin('users', 'messages.user_id', '=', 'users.id')->where(function($query) use ($search) { $query->where('users.username','like', '%'.$search.'%')->orwhere('message_threads.title','like', '%'.$search.'%');
                })->get();
        } else {
            if($category==="all") {
                $messages = Message::leftjoin('message_categories', 'messages.message_category_id', '=', 'message_categories.id')->leftjoin('message_threads','messages.message_thread_id', '=', 'message_threads.id')->where('messages.user_id', null)->leftjoin('members', 'messages.member_id', '=', 'members.id')->leftjoin('users', 'members.user_id', '=', 'users.id')->where(function($query) use ($search) { $query->where('users.username','like', '%'.$search.'%')->orwhere('message_threads.title','like', '%'.$search.'%');})->get();
            } else {
                $messages = Message::leftjoin('message_categories', 'messages.message_category_id', '=', 'message_categories.id')->leftjoin('message_threads','messages.message_thread_id', '=', 'message_threads.id')->where('messages.user_id', null)->leftjoin('members', 'messages.member_id', '=', 'members.id')->leftjoin('users', 'members.user_id', '=', 'users.id')->where('message_categories.category_name', $category)->where(function($query) use ($search) { $query->where('users.username','like', '%'.$search.'%')->orwhere('message_threads.title','like', '%'.$search.'%');
                })->get();
            }
        }

        $threads = Message::leftjoin('message_threads', 'messages.message_thread_id', '=', 'message_threads.id')->where('message_threads.id',$thread_id)->orderBy('messages.date_created','desc')->get();

        return view('contents-admin.customersupport', compact('messages', 'search', 'category', 'threads'));

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
