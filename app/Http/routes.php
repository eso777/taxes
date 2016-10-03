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
     Route::resource('slider','SliderCtrl');
     Route::post('slider/create','SliderCtrl@store');
     //Route::get('slider/delete_img/{id}/{img_name}', 'SliderCtrl@delete_img');
     // slider




     /* // Mail //
       Route::get('mail',function(){

       Mail::send('admin.mail', ['name' => Auth::admin()->get()->name ], function($message)
       {
       $message->to('engyzine@gmail.com' , 'E-Njy')->from('eso50408@gmail.com' , 'Eso')->subject('Welcome! To Try Msg');
       });
       return redirect()->to(Url('/').'/admin') ;
       });

       // Mail // */
});

/*
 * ********************************************************
 * ****    End Application Route [ Back End ]       *******
 * ********************************************************
 */


/************************************************************************************************************************/


/*
 * *********************************************************
 * ******* Start Application Route [ Front End ] ********
 * *********************************************************
 */

//Route::get('/','FrontCtrl@index');

Route::get('/', 'FrontCtrl@index');

Route::get('aboutComp', 'FrontCtrl@aboutCompany');
Route::get('ourServies', 'FrontCtrl@ourServies');
Route::get('blog', 'FrontCtrl@blog');
Route::get('blog/{id}-{slug}', 'FrontCtrl@blog_one');


// Test Route Language 
Route::get('lang/{lang}', 'LanguageCtrl@switcher');



/*
**********************************************************
  ******** End Application Route [ Front End ] ********
**********************************************************
*/