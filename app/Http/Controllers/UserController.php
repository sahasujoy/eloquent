<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\User;
use App\Models\Address;
use App\Models\Image;
use App\Models\Friend;
use App\Models\Profile;

class UserController extends Controller
{
    //
    public function insertRecord()
    {
        $phone = new Phone();
        $phone->phone = "01881881881";
        $user = new User();
        $user->name = "Tavu Saha";
        $user->email = "tavu.s@gmail.com";
        $user->password = encrypt('123456789');
        $user->save();
        $user->phone()->save($phone);
        return "Record has been created successfully!!";
    }

    public function insertFriend()
    {
        $friend = new Friend();
        $friend->name = "kadev";
        $friend->dp = "image/kadev.png";
        $friend->url = "mmrs.com/kadev";
        $friend->user_id = 2;
        $friend->save();
        return "User's friend has been added successfully";
    }

    public function fetchPhoneByUser($id)
    {
        $phone = User::find($id)->phone;
        return $phone;
    }

    public function fetchDeviceByUser($id)
    {
        $device = User::find($id)->device;
        return $device;
    }

    public function fetchUserByPhone($id)
    {
        $user = Phone::find($id)->user;
        return $user;
    }

    public function fetchUserByDevice($id)
    {
        $user = Device::find($id)->user;
        return $user;
    }

    public function fetchAddressByUser($id)
    {
        $address = User::find($id)->address;
        return $address;
    }

    public function fetchUserByAddress($id)
    {
        $user = Address::find($id)->user;
        return $user;
    }

    public function fetchUserByImage($id)
    {
        $user = Image::find($id)->user;
        return $user;
    }

    public function fetchUserByFriend($id)
    {
        $user = Friend::find($id)->user;
        return $user;
    }

    public function fetchImageByUser($id)
    {
        $image = User::find($id)->image;
        return $image;
    }

    public function fetchProfileByUser($id)
    {
        $profile = User::find($id)->profile;
        return $profile;
    }

    public function fetchFriendsByUser($id)
    {
        $friends = User::where('id', $id)->with('friend')->get();
        return $friends;
    }


    //::::::::::::::::::::::::::::::::::::::::::::::::::::: Joining ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function userJoinImage()
    {
        $users = User::join('images', 'users.id', '=', 'images.user_id')
               ->get(['users.*', 'images.title']);

        return $users;
    }

    public function userJoinProfile()
    {
        $user = User::join('profiles', 'users.id', '=', 'profiles.user_id')
        ->get(['users.id', 'users.name', 'users.email', 'profiles.address']); //it will be decorated by 'profiles' table id serial...

        return $user;
    }

    public function userJoinPhone()
    {
        $user = User::join('phones', 'users.id', '=', 'phones.user_id')
        ->get(['users.name', 'phones.phone']);

        return $user;
    }

    public function phoneJoinOperator()
    {
        $phone = Phone::leftJoin('operators', 'operators.phone_id', '=', 'phones.id')
        ->get(['operators.operator_name', 'phones.phone']);

        return $phone;
    }

    public function userJoinPhoneJoinOperator()
    {
        $user = User::join('phones', 'phones.user_id', '=', 'users.id')
        ->join('operators', 'operators.phone_id', '=', 'phones.id')
        ->get();

        return $user;
    }

    public function userJoinTwo()
    {
        $user = User::join('phones', 'phones.user_id', '=', 'users.id')
        ->join('images', 'images.user_id', '=', 'users.id')
        ->get();

        return $user;
    }
}
