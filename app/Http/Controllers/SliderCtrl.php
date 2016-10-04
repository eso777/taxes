<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Validator;

class SliderCtrl extends Controller {

     /**
      * Display a listing of the resource.
      *
      * @return Response
      */
     public function index() {
          $slider = Slider::latest('created_at')->paginate(50);
          return view('admin.slider.index', compact('slider'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */
     public function create() {
          return view('admin.slider.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @return Response
      */
     public function store(Request $request) {

          $validation = Validator::make($request->all(), ['img' => 'required']);
          if ($validation->fails()) {
               return redirect()->back()->withErrors($validation)->withInput();
          }
          if ($request->hasFile('img')) {

               $dest = 'uploads/back/slider/';
               $file_name = time() . "." . $request->file('img')->getClientOriginalExtension();
               $request->file('img')->move($dest, $file_name);
               $request->merge(['image' => $file_name]);
          }

          Slider::create($request->all());
          return redirect()->to(Url('/') . '/admin/slider')->with(['alert' => '<script>swal(" ", "تم الحفظ بنجاح", "success")</script>']);
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
     public function show($id) {
          //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
     public function edit($id) {
          $image = Slider::findOrfail($id);
          return view('admin.slider.edit', compact('image'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  int  $id
      * @return Response
      */
     public function update(Request $request ,$id) {
          $validation = Validator::make($request->all(), ['img' => 'image']);
          if ($validation->fails()) {
               return redirect()->back()->withErrors($validation)->withInput();
          }
          $data = Slider::findOrfail($id) ;
          if ($request->hasFile('img')) {

               $dest = 'uploads/back/slider/';
               $file_name = time() . "." . $request->file('img')->getClientOriginalExtension();
               $request->file('img')->move($dest, $file_name);
               $request->merge(['image' => $file_name]);
          }else
          {
               $request->merge(['image' => $data->image ]);
          }

         $data->update($request->all());
          return redirect()->to(Url('/') . '/admin/slider')->with(['alert' => '<script>swal(" ","تم حفظ التعديلات", "success")</script>']);
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return Response
      */
     public function destroy($id) {
          Slider::findOrfail($id)->delete();
          return redirect()->to(Url('/') . '/admin/slider')->with(['alert' => '<script>swal(" ","تم الحذف بنجاح", "success")</script>']);
     }

}
