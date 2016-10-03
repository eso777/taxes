<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\AboutCompany;
use App\Settings;
use App\News;
use Session;
use App\Slider ;

class FrontCtrl extends Controller {

     function index() {
          // Services
          $services = Service::latest('created_at')->take(6)->get();

          // AboutCompany
          $info = AboutCompany::first();
          // Slider 
          $slider = Slider::latest('created_at')->take(20)->get() ;    
          // Return View Index
          return view('front.index', compact('services', 'info','slider'));
     }

     public function aboutCompany() {
          $info = AboutCompany::first();
          return view('front.aboutCompany.index', compact('info'));
     }

     function ourServies() {
          $service = Service::latest()->get();
          return view('front.service.index', compact('service'));
     }

     function blog() {

          $blog = News::latest()->paginate(8);
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
          //dd($related_art);
          /*
            $blog_related = News::where('tags_ar','like','%'.$blog_one->tags_ar.'%')
            ->orwhere('tags_en','like','%'.$blog_one->tags_en.'%')
            ->where('id','!==',$id)
            ->latest('created_at')
            ->take(5)
            ->get(); */

          return view('front.blog.blog_one', compact('blog_one', 'related_art'));
     }

}
