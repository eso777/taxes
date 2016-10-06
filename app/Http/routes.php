<?php

/*
 * *********************************************************
 * ******* Start Application Route [ Back End ] ********
 * *********************************************************
 */


Route::get('admin/login', 'LoginCtrl@showAdminLogin');
Route::post('admin/login', 'LoginCtrl@postAdminLogin');
Route::get('admin/logout', 'LoginCtrl@AdminLogout');


Route::group(['prefix' => 'admin', 'middleware' => 'authAdmin'], function() {

     Route::get('/', 'backEnd@index');

     // Settings 
     Route::resource('settings', 'SettingsCtrl');
     // Settings 
     // Admins 
     Route::resource('admins', 'AdminsCtrl');
     // Admins 
     // Users
     //Route::delete('message/send','UsersCtrl@xxx');
     Route::resource('users', 'UsersCtrl');
     Route::get('users/send/msg', 'UsersCtrl@sendMsg');
     Route::get('users/{id}/status', 'UsersCtrl@statusUser'); // Active OR Disactive useers
     //Route::get('users/getJson','UsersCtrl@jsonData');
     // Users
     // services
     Route::resource('services', 'ServicesCtrl');
     Route::get('serv-img-delete/{pid}/{name}', 'ServicesCtrl@delete_img');
     // services
     // news 
     Route::resource('news', 'NewsCtrl');
     Route::get('news-img-delete/{pid}/{name}', 'NewsCtrl@delete_img');
     // news	
     // Messages //
     Route::resource('messages', 'MsgCtrl');
     Route::get('messages/getMsgs/{pid}', 'MsgCtrl@getMsgs');
     Route::post('messages/getMsgs', 'MsgCtrl@store');
     Route::post('messages/getMsgs/{pid}', 'MsgCtrl@store');
     // Messages //
     // About Company
     Route::resource('aboutComp', 'aboutCompCtrl');
     Route::get('aboutComp/delete_img/{img_name}', 'aboutCompCtrl@delete_img');
     // About Company
     // slider
     Route::resource('slider', 'SliderCtrl');
     Route::post('slider/create', 'SliderCtrl@store');
     // slider
     // Consulting
     Route::resource('consulting', 'ConsultingCtrl');
     // Consulting
     // AdS
     Route::get('ads', 'AdsCtrl@index');
     Route::post('ads/create', 'AdsCtrl@store');
     // AdS         
     
});

/*
 * ********************************************************
 * ****    End Application Route [ Back End ]       *******
 * ********************************************************
 */


/* * ********************************************************************************************************************* */


/*
 * *********************************************************
 * ******* Start Application Route [ Front End ] ********
 * *********************************************************
 */
// The Index Page 
Route::get('/', 'FrontCtrl@index');
// The Index Page 
// About Company
Route::get('aboutComp', 'FrontCtrl@aboutCompany');
// About Company
// Our services
Route::get('ourServies', 'FrontCtrl@ourServices');
// Our services
// Contact Us
Route::get('contactUs', 'FrontCtrl@contactUs');
Route::post('contactUs', 'FrontCtrl@sendInformation');
// Contact Us
// Blog
Route::get('blog', 'FrontCtrl@blog');
Route::get('blog/{id}-{slug}', 'FrontCtrl@blog_one');
// Blog
// Consulting
Route::get('consulting', 'FrontCtrl@consulting');
Route::get('consulting/{id}-{slug}', 'FrontCtrl@consulting_one');
// Consulting
// Language Route
Route::get('lang/{lang}', 'LanguageCtrl@switcher');


/*
**********************************************************
  ******** End Application Route [ Front End ] ********
**********************************************************
*/


     /* // Mail *
       Route::get('mail',function(){

       Mail::send('admin.mail', ['name' => Auth::admin()->get()->name ], function($message)
       {
       $message->to('eng.ahmedmgad@gmail.com' , 'Senior Ahmed gad 2r2osha')->from('eso50408@gmail.com' , 'Eso')->subject('Welcome! To Try Msg');
       });
       return redirect()->to(Url('/').'/admin') ;
       });

     /*  Mail  */
