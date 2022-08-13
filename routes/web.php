<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
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
    dd(app());
    return view('index');
});


//:::::::::::::::::::::::::::::::::::::::: CRUD OPERATION :::::::::::::::::::::::::::::::::::::::::::::::::::::
//------------------------------------ Post Start ----------------------------------------
// Route::prefix('post')->group(function()
// {

// });

Route::get('/add-post', [PostController::class, 'addPost'])->name('post.add');

Route::post('/create-post', [PostController::class, 'createPost'])->name('post.create');

Route::get('/posts', [PostController::class, 'getPost'])->name('post.get');

Route::get('/posts/{id}', [PostController::class, 'getPostById'])->name('post.getbyid');

Route::get('/delete_post/{id}', [PostController::class, 'deletePost'])->name('post.delete');

Route::get('/edit_post/{id}', [PostController::class, 'editPost'])->name('post.edit');

Route::post('/update_post', [PostController::class, 'updatePost'])->name('post.update');

Route::get('/getcatbypost/{id}', [PostController::class, 'getCatByPost'])->name('post.getcat');

Route::get('/get_posts_by_cat/{id}', [PostController::class, 'getPostByCat'])->name('cat.getpost');
//---------------------------------- Post End ----------------------------------------------

//-------------------------------------Category Start ----------------------------------------------------
Route::get('/add_category', [CategoryController::class, 'addCategory'])->name('category.add');

Route::post('/create_category', [CategoryController::class, 'createCategory'])->name('category.create');

Route::get('/categories', [CategoryController::class, 'getCategory'])->name('category.get');

Route::get('/categories/{id}', [CategoryController::class, 'getCategoryById'])->name('category.getbyid');

Route::get('/delete_caregory/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');

Route::get('/edit_category/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');

Route::post('/update_category', [CategoryController::class, 'updateCategory'])->name('category.update');
//-------------------------------------Category End ----------------------------------------------------

Route::get('/add_roles', [RoleController::class, 'addRole'])->name('role.add');

Route::get('/add_user', [UserController::class, 'insertRecord'])->name('user.add');

Route::get('/add_friend', [UserController::class, 'insertFriend'])->name('user.friend.add');






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

Route::get('/user-join-device', [UserController::class, 'userJoinDevice'])->name('user.joindevice');

Route::get('/cross-join', [UserController::class, 'crossJoin'])->name('user.crossjoin');

Route::get('/advanced-join', [UserController::class, 'advancedJoin'])->name('user.advancedjoin');



