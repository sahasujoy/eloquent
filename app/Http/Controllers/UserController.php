<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\User;
use App\Models\Address;
use App\Models\Image;

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

    }

    public function fetchUserByImage($id)
    {
        $user = Image::find($id)->user;
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
}
