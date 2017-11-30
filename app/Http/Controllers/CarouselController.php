<?php

namespace App\Http\Controllers;

use App\Carousel;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class CarouselController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::all();
        return view('contents-admin.carouselhome', compact('carousels'));
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
        if(Input::hasFile('image1')) {
            $carousel = new Carousel;

            $file = Input::file('image1');
            $file->move(public_path().'/img/carousel/', $file->getClientOriginalName());
            $carousel->image = $file->getClientOriginalName();
            $carousel->size = $file->getClientsize();
            $carousel->type = $file->getClientMimeType();
            $carousel->modified_by = Auth::user();

            $carousel->save();
        }

        if(Input::hasFile('image2')) {
            $carousel = new Carousel;

            $file = Input::file('image2');
            $file->move(public_path().'/img/carousel/', $file->getClientOriginalName());
            $carousel->image = $file->getClientOriginalName();
            $carousel->size = $file->getClientsize();
            $carousel->type = $file->getClientMimeType();
            $carousel->modified_by = Auth::user();

            $carousel->save();
        }

        if(Input::hasFile('image3')) {
            $carousel = new Carousel;

            $file = Input::file('image3');
            $file->move(public_path().'/img/carousel/', $file->getClientOriginalName());
            $carousel->image = $file->getClientOriginalName();
            $carousel->size = $file->getClientsize();
            $carousel->type = $file->getClientMimeType();
            $carousel->modified_by = Auth::user();

            $carousel->save();
        }
        return Redirect::to('carouseladmin');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(Input::hasFile('image1')) {
            $carousel = Carousel::find(Input::get('carousel_img1'));

            $file = Input::file('image1');
            $file->move(public_path().'/img/carousel/', $file->getClientOriginalName());
            $carousel->image = $file->getClientOriginalName();
            $carousel->size = $file->getClientsize();
            $carousel->type = $file->getClientMimeType();
            $carousel->modified_by = Auth::user();

            $carousel->save();
        }

        if(Input::hasFile('image2')) {
            $carousel = Carousel::find(Input::get('carousel_img2'));
            $file = Input::file('image2');
            $file->move(public_path().'/img/carousel/', $file->getClientOriginalName());
            $carousel->image = $file->getClientOriginalName();
            $carousel->size = $file->getClientsize();
            $carousel->type = $file->getClientMimeType();
            $carousel->modified_by = Auth::user();

            $carousel->save();
        }

        if(Input::hasFile('image3')) {
            $carousel = Carousel::find(Input::get('carousel_img3'));
            $file = Input::file('image3');
            $file->move(public_path().'/img/carousel/', $file->getClientOriginalName());
            $carousel->image = $file->getClientOriginalName();
            $carousel->size = $file->getClientsize();
            $carousel->type = $file->getClientMimeType();
            $carousel->modified_by = Auth::user();

            $carousel->save();
        }
        return Redirect::to('carouseladmin');
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
