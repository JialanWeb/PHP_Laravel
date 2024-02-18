<?php

use Illuminate\Support\Facades\Route;
#use App\Http\Controllers\TestController;
#Route::get('/user', [TestController::class, 'index']);
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

Route::get('/user-klasse-webfull04-2023', 'TestController@index')->name('user');//langen namen mit kurzem namen verbinden

Route::resource('users', 'UserController');

#Route::resource('post', 'PostController')->middleware('auth');
Route::resource('post', 'PostController');

Route::resource('tag', 'TagController');

Route::get('post/del/{id}', 'PostController@showDelete');

Route::get('/post/tag/{tag_id}', 'PostTagController@filteredPosts');

Route::get('/post/{post_id}/tag/{tag_id}/attach', 'PostTagController@attachTag');

Route::get('/post/{post_id}/tag/{tag_id}/detach', 'PostTagController@detachTag');

Route::get('/', function () {
    return view('startseite');
});

Route::get('about', function() {
    return view('about');
});   #about前面加上/也可以

Route::get('contact', function() {
    /* return view('kontakt'); */
    #dd(DB::table('posts')->get());  #显示posts所有内容

    #dd(DB::table('posts')->pluck('id','titel')); #仅显示posts里面id, titel

    #dd(DB::table('posts')->select('id','titel','comment')->get()); #与上面差不多
    #dd(DB::table('users')->where('id',1)->get());#仅显示id=1的那条数据

    #dd(DB::table('users')->where('id','>',1)->get());#显示id>2的所有数据

    #dd(DB::table('posts')->whereBetween('id', [9, 11])->get());
    #显示id在9-11之间(包括9， 11)的所有数据

    #dd(DB::table('posts')->whereIn('id', [9, 11， 888])->get());
    #显示id为9或11或888的所有数据，没有那条数据也不会报错

    #dd(DB::table('posts')->select('id', 'titel')->whereIn('id', [9, 11， 888])->get());

    #dd(DB::table('posts')->select('id','titel','created_at')-> whereNull('created_at')->get());

    #dd(DB::table('posts')->select('id','titel','created_at')-> whereNotNull('created_at')->get());

    #dd(DB::table('posts')->where('id', 11)->delete());
    #删除id=11的那条数据

    #dd(DB::table('posts')->count()); #计算总数
    
});

Route::get('referenzen', function() {
    return view('referenzen');
});

Route::get('test2', function() {
    return view('test2');
});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
