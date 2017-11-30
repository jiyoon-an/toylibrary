<?php

namespace App\Http\Controllers;

use App\FAQ;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class FAQController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('contents-admin.faqlist', compact('faqs'));
    }

    public function addfaq()
    {   
        $func = 'add';
        return view('contents-admin.faqsadmin', compact('func'));
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
        $faq = new Faq;

        $faq->question = Input::get('question');
        $faq->answer = Input::get('answer');
        $is_enabled = Input::get('is_enabled');
        if(empty($is_enabled))
            $is_enabled = 0;
        $faq->is_enabled = $is_enabled;
        $faq->modified_by = Auth::user();

        $faq->save();

        return Redirect::to('faqadmin');
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
        $faq = Faq::find($id);
        $func = 'edit';
        return view('contents-admin.faqsadmin', compact('faq', 'func'));
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
        $faq = Faq::find($id);

         $faq->question = Input::get('question');
        $faq->answer = Input::get('answer');
        $is_enabled = Input::get('is_enabled');
        if(empty($is_enabled))
            $is_enabled = 0;
        $faq->is_enabled = $is_enabled;
        $faq->modified_by = Auth::user();

        $faq->save();

        return Redirect::to('faqadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::find($id)->delete();
        return Redirect::to('faqadmin');
    }
}
