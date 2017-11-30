<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('aboutus', 'HomeController@aboutus');
Route::get('toys', 'HomeController@toys');
Route::post('toys/{toy}', 'HomeController@addtocart');
Route::get('toy-item/{toy}', 'HomeController@showtoyitem');
Route::get('shoppingcart', 'HomeController@shoppingcart');
Route::get('shoppingcart/update_item={id}', 'HomeController@updatecart');
Route::get('shoppingcart/remove_item={id}', 'HomeController@removeincart');
Route::get('membership', 'HomeController@membership');
Route::get('memberprofile', 'HomeController@memberprofile');
Route::get('news', 'HomeController@news');
Route::get('newsentry', 'HomeController@newsentry');
Route::get('donation', 'HomeController@donation');
Route::get('contactus', 'HomeController@contactus');
Route::post('checkout', 'HomeController@checkout');

Route::get('toymanagement', 'ToyController@index');
Route::post('store', 'ToyController@store');

//for admin page
Route::get('admin', 'AdminController@index');
Route::get('emailconfiguration', 'AdminController@emailconfiguration');
Route::get('emailtemplate', 'AdminController@emailtemplate');
Route::get('emailtemplatedetail', 'AdminController@emailtemplatedetail');

//LibraryInfoController
Route::get('libraryinfo', 'LibraryInfoController@index');
Route::get('libraryinfo/{id}/edit', 'LibraryInfoController@edit');
Route::put('libraryinfo/{id}', 'LibraryInfoController@update');

//StaffController
Route::get('staff', 'StaffController@index');
Route::get('staff/add', 'StaffController@addstaff');
Route::post('staff', 'StaffController@store');
Route::get('staff/{search}', 'StaffController@show');
Route::get('staff/{id}/edit', 'StaffController@edit');
Route::get('staff/{id}/delete', 'StaffController@delete');
Route::put('staff/{id}', 'StaffController@update');
Route::delete('staff/{id}', 'StaffController@destroy');

//NewsController
Route::get('newsadmin', 'NewsController@index');
Route::get('newsadmin/add', 'NewsController@addnews');
Route::post('newsadmin', 'NewsController@store');
Route::get('newsadmin/{search}', 'NewsController@show');
Route::get('newsadmin/{id}/edit', 'NewsController@edit');
Route::get('newsadmin/{id}/delete', 'NewsController@delete');
Route::put('newsadmin/{id}', 'NewsController@update');
Route::delete('newsadmin/{id}', 'NewsController@destroy');

//DonationController
Route::get('donationadmin', 'DonationController@index');
Route::get('donationadmin/add', 'DonationController@adddonation');
Route::post('donationadmin', 'DonationController@store');
Route::get('donationadmin/{id}/edit', 'DonationController@edit');
Route::put('donationadmin/{id}', 'DonationController@update');
Route::delete('donationadmin/{id}', 'DonationController@destroy');

//FAQController
Route::get('faqadmin', 'FAQController@index');
Route::get('faqadmin/add', 'FAQController@addfaq');
Route::post('faqadmin', 'FAQController@store');
Route::get('faqadmin/{id}/edit', 'FAQController@edit');
Route::put('faqadmin/{id}', 'FAQController@update');
Route::delete('faqadmin/{id}', 'FAQController@destroy');

//SponsorController
Route::get('sponsoradmin', 'SponsorController@index');
Route::get('sponsoradmin/add', 'SponsorController@addsponsor');
Route::post('sponsoradmin', 'SponsorController@store');
Route::get('sponsoradmin/{id}/edit', 'SponsorController@edit');
Route::put('sponsoradmin/{id}', 'SponsorController@update');
Route::delete('sponsoradmin/{id}', 'SponsorController@destroy');

//CarouselController
Route::get('carouseladmin', 'CarouselController@index');
Route::post('carouseladmin', 'CarouselController@store');
Route::put('carouseladmin', 'CarouselController@update');

//AnnouncementController
Route::get('announcement', 'AnnouncementController@index');
Route::get('announcement/add', 'AnnouncementController@addannouncement');
Route::post('announcement', 'AnnouncementController@store');
Route::get('announcement/{id}/edit', 'AnnouncementController@edit');
Route::put('announcement/{id}', 'AnnouncementController@update');
Route::delete('announcement/{id}', 'AnnouncementController@destroy');

//MembershipController
Route::get('membershipadmin', 'MembershipController@index');
Route::get('membershipadmin/add', 'MembershipController@addmembership');
Route::post('membershipadmin', 'MembershipController@store');
Route::get('membershipadmin/{search}', 'MembershipController@show');
Route::get('membershipadmin/{id}/edit', 'MembershipController@edit');
Route::put('membershipadmin/{id}', 'MembershipController@update');
Route::delete('membershipadmin/{id}', 'MembershipController@destroy');

//LoanTypeController
Route::get('loantype', 'LoanTypeController@index');
Route::get('loantype/add', 'LoanTypeController@addloantype');
Route::post('loantype', 'LoanTypeController@store');
Route::get('loantype/{search}', 'LoanTypeController@show');
Route::get('loantype/{id}/edit', 'LoanTypeController@edit');
Route::put('loantype/{id}', 'LoanTypeController@update');
Route::delete('loantype/{id}', 'LoanTypeController@destroy');

//ToyGroupController
Route::get('toygroup', 'ToyGroupController@index');
Route::get('toygroup/add', 'ToyGroupController@addtoygroup');
Route::post('toygroup', 'ToyGroupController@store');
Route::get('toygroup/{search}', 'ToyGroupController@show');
Route::get('toygroup/{id}/edit', 'ToyGroupController@edit');
Route::put('toygroup/{id}', 'ToyGroupController@update');
Route::delete('toygroup/{id}', 'ToyGroupController@destroy');

//ToyAdminController
Route::get('toyadmin', 'ToyAdminController@index');
Route::get('toyadmin/{search}', 'ToyAdminController@show');
Route::get('toyadmin/{id}/edit', 'ToyAdminController@edit');
Route::put('toyadmin/{id}', 'ToyAdminController@update');
Route::delete('toyadmin/{id}', 'ToyAdminController@destroy');
Route::get('damagedtoys', 'ToyAdminController@damagedtoy');
Route::get('disposedtoys', 'ToyAdminController@disposedtoy');
Route::get('toysforsale', 'ToyAdminController@toysforsale');
Route::put('toysforsale/add', 'ToyAdminController@updateadd');
Route::put('toysforsale/confirm', 'ToyAdminController@updateconfirm');
Route::put('toysforsale/dispose', 'ToyAdminController@updatedispose');
Route::put('toysforsale/remove', 'ToyAdminController@updateremove');
Route::get('loanhistory', 'ToyAdminController@loanhistory');
Route::post('loanhistory', 'ToyAdminController@showloanhistory');
Route::get('agegrouplist', 'ToyAdminController@agegrouplist');
Route::get('toypopularity', 'ToyAdminController@toypopularity');
Route::get('toypurchased', 'ToyAdminController@toypurchased');
Route::get('overduetoys', 'ToyAdminController@overduetoys');

//MemberController
Route::get('memberadmin', 'MemberController@index');
Route::get('memberadmin/{name}', 'MemberController@show');
Route::get('memberadmin/{id}/edit', 'MemberController@edit');
Route::put('memberadmin/{id}', 'MemberController@update');
Route::delete('memberadmin/{id}', 'MemberController@destroy');
Route::get('memberloanhistory', 'MemberController@loanhistory');
Route::post('memberloanhistory', 'MemberController@showloanhistory');
Route::put('memberloanhistory/{id}', 'MemberController@editloanhistory');
Route::delete('memberloanhistory/{id}', 'MemberController@destroyloanhistory');
Route::get('membertransactionhistory', 'MemberController@transactionhistory');
Route::post('membertransactionhistory', 'MemberController@showtransactionhistory');
Route::get('expiredmember', 'MemberController@expiredmember');

//MoneyController]
Route::get('loansbymember', 'MoneyController@index');
Route::post('loansbymember', 'MoneyController@store');
Route::get('loansbymember/{member_id}/{toy_id}', 'MoneyController@show');
Route::put('loansbymember/return/{id}', 'MoneyController@updatereturninloansbymember');
Route::put('loansbymember/reissue/{id}', 'MoneyController@updatereissueinloansbymember');
Route::get('allloans', 'MoneyController@allloans');
Route::get('allloans/{search}', 'MoneyController@showloans');
Route::put('allloans/return/{id}', 'MoneyController@updatereturn');
Route::put('allloans/reissue/{id}', 'MoneyController@updatereissue');

//CustomerSupportController
Route::get('customersupport', 'CustomerSupportController@index');
Route::get('customersupport/{category}', 'CustomerSupportController@show');
Route::get('customersupport/{category}/{search}', 'CustomerSupportController@showresult');
Route::get('customersupport/{category}/{search}/{id}', 'CustomerSupportController@showthread');
Route::post('customersupport/store/{user_id}/{thread}/{category}', 'CustomerSupportController@store');

//OrderController
Route::get('order', 'OrderController@index');
Route::get('order/{id}', 'OrderController@show');
Route::get('order/{id}/edit', 'OrderController@edit');
Route::put('order/{id}', 'OrderController@update');
Route::geT('orderdetails', 'OrderController@detail');

Route::auth();