<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


//:::::::::::::::::::::::::::::::::::::::: CRUD OPERATION :::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/add-post', [PostController::class, 'addPost'])->name('post.add');

Route::Post('/create-post', [PostController::class, 'createPost'])->name('post.create');

Route::get('/posts', [PostController::class, 'getPost'])->name('post.get');

Route::get('/posts/{id}', [PostController::class, 'getPostById'])->name('post.getbyid');

Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('post.delete');

Route::get('/edit-post/{id}', [PostController::class, 'editPost'])->name('post.edit');

Route::post('/update-post', [PostController::class, 'updatePost'])->name('post.update');

Route::get('/add-user', [UserController::class, 'insertRecord'])->name('user.add');

Route::get('/add-friend', [UserController::class, 'insertFriend'])->name('user.friend.add');




//:::::::::::::::::::::::::::::::::::: RELATION ROUTES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/get-phone/{id}', [UserController::class, 'fetchPhoneByUser'])->name('user.getphone'); // One to One

Route::get('/get-address/{id}', [UserController::class, 'fetchAddressByUser'])->name('user.getaddress'); // One to One

Route::get('/get-profile/{id}', [UserController::class, 'fetchProfileByUser'])->name('user.getprofile'); // One to One

Route::get('/get-device/{id}', [UserController::class, 'fetchDeviceByUser'])->name('user.getdevice'); // One to Many

Route::get('/get-image/{id}', [UserController::class, 'fetchImageByUser'])->name('user.getimage'); // One to Many

Route::get('/get-user-by-device/{id}', [UserController::class, 'fetchUserByDevice'])->name('device.getuser'); // One to Many - Reverse

Route::get('/get-user-by-phone/{id}', [UserController::class, 'fetchUserByPhone'])->name('phone.getuser'); // One to One - Reverse

Route::get('/get-user-by-address/{id}', [UserController::class, 'fetchUserByAddress'])->name('address.getuser'); // One to One - Reverse

Route::get('/get-user-by-image/{id}', [UserController::class, 'fetchUserByImage'])->name('image.getuser'); // One to One - Reverse

Route::get('/get-friends/{id}', [UserController::class, 'fetchFriendsByUser'])->name('user.getfriends');

Route::get('/get-user-by-friend/{id}', [UserController::class, 'fetchUserByFriend'])->name('friend.getuser');


//--------------------------------------------------------------------------------------------------------------------------------------

Route::get('/get-company-by-member', [MemberController::class, 'getCompanyByMember'])->name('member.company');

Route::get('/get-device-by-member', [MemberController::class, 'getDeviceByMember'])->name('data.get');

//-----------------------------------------------------------------------------------------------------------------------------------


//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: JOINING ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/user-join-image', [UserController::class, 'userJoinImage'])->name('user.jointest');

Route::get('/user-join-profile', [UserController::class, 'userJoinProfile'])->name('user.joinprofile');

Route::get('/user-join-phone', [UserController::class, 'userJoinPhone'])->name('user.joinphone');

Route::get('/phone-join-operator', [UserController::class, 'phoneJoinOperator'])->name('phone.joinoperator');

Route::get('/user-join-phone-join-operator', [UserController::class, 'userJoinPhoneJoinOperator'])->name('user.joinphoneoperator'); // 3 table joining

Route::get('/user-join-two', [UserController::class, 'userJoinTwo'])->name('user.jointwo');



