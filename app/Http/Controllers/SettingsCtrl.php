<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings;
use App\Admin;
use Auth;
use Validator;
use App;
use Session; //Test 

class SettingsCtrl extends Controller {

     public function index() {

          $settings = Settings::first();
          //dd($settings) ;
          return view('admin.settings', compact('settings'));
     }

     private function rules() {
          /* Make rules inputs by type parameter with ID */
          return [

              'site_name_ar' => 'required',
              'site_name_en' => 'required',
              'site_desc_ar' => 'required',
              'site_desc_en' => 'required',
              'site_tags_ar' => 'required',
              'site_tags_en' => 'required',
              'address_ar' => 'required',
              'address_en' => 'required',
              'facebook' => 'required',
              'twitter' => 'required',
              'google_Plus' => 'required',
              'youtube' => 'required',
              'linkedIn' => 'required',
              'email' => 'required|email',
              'email_2' => 'email',
          ];
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  int  $id
      * @return Response
      */
     public function update(Request $request, $id) {
          $validation = Validator::make($request->all(), $this->rules());
          if ($validation->fails()) {
               return redirect()->back()->withErrors($validation)->withInput();
          }

          // Get Data From request and assgin it to var .
          $data = $request->all();
          Settings::findOrFail($id)->update($data);
          return redirect()->to(Url('/') . '/admin/settings')->with(['alert' => '<script>swal(" ", "تم حفظ التعديلات بنجاح", "success")</script>']);
     }

}
