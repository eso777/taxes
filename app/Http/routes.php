<?php

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
    Route::get('servies/{id}-{slug}', 'FrontCtrl@service_one');
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
    Route::get('send/consulting', 'FrontCtrl@send_consulting_view');
    Route::post('send/consulting', 'FrontCtrl@send_consulting');
    // Consulting
    // Language Route
    Route::get('lang/{lang}', 'LanguageCtrl@switcher');


/*
**********************************************************
  ******** End Application Route [ Front End ] ********
**********************************************************
*/




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
    Route::resource('ads', 'AdsCtrl');
    /*Route::get('ads', 'AdsCtrl@index');
    Route::post('ads/create', 'AdsCtrl@store');*/

    // AdS

    //testimonials
    Route::resource('testimonials','TestimonialsCtrl');
    Route::get('testimonials/{pid}/toggle','TestimonialsCtrl@toggle');
    //testimonials

    // ticktes
    Route::resource('ticktes', 'TicktesCtrl');
    Route::get('ticktes/{id}/switch', 'TicktesCtrl@switchCase');
    Route::post('ticktes/{id}', 'TicktesCtrl@post_ticketReplay');

    //Route::get('ticktes/getTickets/{pid}', 'MsgCtrl@getMsgs');
   // Route::post('ticktes/getMsgs/{pid}', 'MsgCtrl@store');
    // ticktes
});

/*
 * ********************************************************
 * ****    End Application Route [ Back End ]       *******
 * ********************************************************
 */


/* * ********************************************************************************************************************* */


/*
**********************************************************
  ******** Start Application Route [ Dashboard ] ********
**********************************************************
*/

Route::get('login','LoginCtrl@showClientLogin');
Route::post('login','LoginCtrl@postClientLogin');
Route::get('register','LoginCtrl@showClientReg');
Route::post('register','LoginCtrl@postClientReg');

Route::get('logout','LoginCtrl@ClientLogout');

Route::group(['prefix'=>'dashboard','middleware'=>'auth'],function(){

    Route::get('/','DashboardCtrl@index');


    Route::get('messages','DashboardCtrl@msgs');
    Route::post('messages','DashboardCtrl@msgsSend');

    Route::get('edit_personal','DashboardCtrl@editProfile');
    Route::post('edit_personal','DashboardCtrl@postProfile');

    Route::get('new_testimonial','DashboardCtrl@new_testimonial');
    Route::post('new_testimonial','DashboardCtrl@post_testimonial');

    Route::get('tickets/create','DashboardCtrl@new_ticket');
    Route::get('tickets','DashboardCtrl@getTickets');
    Route::get('ticket/{id}','DashboardCtrl@show_ticket');
    Route::post('tickets/create','DashboardCtrl@post_ticket');


    


});
