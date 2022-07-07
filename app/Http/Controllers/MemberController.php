<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function getCompanyByMember()
    {
        return Member::find(1)->getCompany;
    }

    public function getDeviceByMember()
    {
        return Member::find(2)->getDevice;
    }
}
