<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\AboutCompany;
use App\Settings;
use App\News;
use App\Slider;
use Session;
use Validator;
use Mail ;
use Lang ;
use App\Consulting ;

class FrontCtrl extends Controller {
     /* Start Front End Index Page  */

     function index() {
          // Services
          $services = Service::latest('created_at')->take(6)->get();
          // AboutCompany
          $info = AboutCompany::first();
          // Slider 
          $slider = Slider::latest('created_at')->take(20)->get();
          // Return View Index
          return view('front.index', compact('services', 'info', 'slider'));
     }

     public function aboutCompany() {
          $info = AboutCompany::first();
          return view('front.aboutCompany.index', compact('info'));
     }

     function ourServices() {
          $service = Service::latest()->get();
          return view('front.service.index', compact('service'));
     }

     /* Start Front End Index Page  */

     /* Start Page Blog */

     function blog() {

          $blog = News::latest('created_at')->paginate(8);
          return view('front.blog.index', compact('blog'));
     }

     function blog_one($id, $slug) {
          $blog_one = News::findOrfail($id);
          if ($slug !== $blog_one['slug_' . Session::get('local')]) {
               return redirect()->to(Url('blog/' . $blog_one->id . '-' . $blog_one['slug_' . Session::get('local')]));
          }
          //dd($blog_related );
          $tags = explode(',', $blog_one['tags_' . Session::get('local')]);
          $i = 0;
          $related_art = [];
          foreach ($tags as $tag) {
               $related = News::where('tags_ar', 'like', '%' . $tag . '%')
                       ->orwhere('tags_en', 'like', '%' . $tag . '%')
                       ->latest('created_at')
                       ->take(5)
                       ->get();
               foreach ($related as $relates) {
                    if ($relates['id'] !== $blog_one->id) {
                         $related_art[$i]['id'] = $relates['id'];
                         $related_art[$i]['name'] = $relates['news_title_' . Session::get('local')];
                         $related_art[$i]['slug'] = $relates['slug_' . Session::get('local')];
                         $related_art[$i]['image'] = $relates['img'];
                         $i++;
                    }
               }
          }

          return view('front.blog.blog_one', compact('blog_one', 'related_art'));
     }

     /* End Page Blog */

     /* Start Page Contact Us */

     function contactUs() {
          $settings = Settings::first();
          return view('front.contactUs.index', compact('settings'));
     }

     function sendInformation(Request $request) {
          $rules = [
              'name' => 'required',
              'email' => 'required|email',
              'phone' => 'required|min:11',
              'about' => 'required',
              'subject' => 'required',
          ];
          $validation = Validator::make($request->all(), $rules);
          if ($validation->fails()) {
               return redirect()->back()->withErrors($validation)->withInput();
          }

          //*****  Mail *****//
          $data = [
              'name'    => $request->name ,
              'email'   => $request->email ,
              'phone'   => $request->phone ,
              'about'   => $request->about ,
              'subject' => $request->subject ,
              ];
          $check = Mail::send('emails.contact', $data, function($message) use($request) {
               $message->to('eso50408@gmail.com', 'Admin')->from($request->email,$request->name)->subject($request->about);
          });
          
          if($check)
          {
               if(Session::get('local') == 'ar')
               {
                    return redirect()->to(Url('/').'/contactUs')->with(['msgSuccess'=>'<script>swal(" ","تم الإرسال بنجاح وسيتم التواصل في اقرب فرصة","success")</script>']);
               }
               return redirect()->to(Url('/').'/contactUs')->with(['msgSuccess'=>'<script>swal(" ","Message Was Send Successfully , And will communicate soon","success")</script>']);
          }
          // Mail // 
     }

     /* End Page Contact Us */
     
     /* Start Page Consulting */
     function consulting() {
          $consulting = Consulting::latest('created_at')->paginate(8) ; 
          return view('front.consulting.index',  compact('consulting'));
          
     }    
     
     function consulting_one($id,$slug) {
          
          $consulting_one = Consulting::findOrfail($id);
          if ($slug !== $consulting_one['slug_' . Session::get('local')]) {
               return redirect()->to(Url('consulting/' . $consulting_one->id . '-' . $consulting_one['slug_' . Session::get('local')]));
          }
          
          return view('front.consulting.consulting_one', compact('consulting_one'));
     } 
     /* End Page Consulting */
}
