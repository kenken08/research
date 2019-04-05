<?php

use App\research_details;
use App\research_papers;
// use Illuminate\Pagination\Paginator;
// use App\colleges;
// use App\programs;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@home')->name('home');
Route::resource('/sign-up', 'UserController');
Route::get('/about','PagesController@about')->name('about');
Route::get('/faq','PagesController@faq')->name('faq');
Route::get('/contact','PagesController@contact')->name('contact');


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/user-dashboard', 'PagesController@Dash')->name('userdash');
Route::post('/upload-manuscript', function(){
    $search = input::get('rsnumber');
    if(!$search == ''){
        $result = DB::table('research_papers')
                ->where('id','=',$search)->get();
        if(count($result)>0){
            return view('userdash.uploadmanuscript')->withDetails($result)->withQuery($search);
        }
    }
    return view('');
});

Route::post('/search-result', 'SearchController@search')->name('search-result');
// Route::post('/tsearch-result', 'SearchController@tagSearch');
Route::get('/search-result/{id}/viewer', 'ViewerController@show');
Route::get('/proposal/{id}', 'ViewerController@viewProposal');
Route::get('/manuscript/{id}','ViewerController@viewManuscript');
Route::get('/guidelines/{id}','ViewerController@viewGuide');

Route::post('/upload-proposal','UploadController@upload')->middleware('auth');
Route::get('/upload-proposal', 'UploadController@index')->middleware('auth')->name('proposal');
Route::get('/upload-proposal/proposal', 'UploadController@show')->name('showproposal');
Route::get('/upload-proposal/manuscript', 'UploadController@showManu');
Route::get('/upload-proposal/manuscript/{id}/tags', 'UploadController@editTags');

Route::post('/upload-manuscript/manuscript/tags', 'UploadController@updatetags');
Route::post('/upload-manuscript/manuscript', 'UploadController@manuscript');
Route::post('/upload-manuscript/update', 'UploadController@update');

// Route::get('/send-number', 'HomeController@sendNumber');
Route::post('/send-number/{id}/email', 'UploadController@sendMail');
Route::post('/send-revision/{id}/email', 'UploadController@sendRevision');

// Users Routes
Route::get('/users','UserController@showUsers');

Route::get('/users/create','UserController@createUser');
Route::post('/users/{id}/delete','UserController@destroy');
Route::post('/users/create','UserController@storeUser')->name('storeUser');
Route::post('/users/{id}/recover','UserController@recover');

Route::get('/account','UserController@viewAccount');
// Route::get('/deleted-users','UserController@viewDeletedUser');
Route::get('/userdash-profile','UserController@userProfile');

Route::post('/userdash-profile/update','UserController@userEmailUpdate');
Route::post('/account/upload','UserController@uploadProfilepic');
Route::post('/account/update','UserController@updateAccount');
Route::post('/account/changepwd','UserController@changepwd');


//Archive
Route::get('/upload-archive','UploadController@addArchive');
Route::get('/show-archive','UploadController@showArchive');
Route::post('/upload-archive','UploadController@storeArchive')->name('storearchive');
// End of Users Routes

Route::get('/messages','MessagesController@index');
Route::post('/send-message','MessagesController@sendMessage')->name('sendMessage');
Route::post('/messages/{id}','MessagesController@showMessages')->name('showMessages');
Route::post('/messages/{id}/reply','MessagesController@replyTo')->name('replyTo');

Route::get('/user-messages','MessagesController@userindex');

Route::get('/dashboard/announcements','MessagesController@announce');
Route::post('/dashboard/announcements','MessagesController@addAnnounce');

Route::get('/dashboard/banners','BannerController@showBanners');
Route::post('/dashboard/banners/add','BannerController@addBanner');
Route::post('/dashboard/updateStat/{id}','BannerController@updateStat')->name('update-stat');