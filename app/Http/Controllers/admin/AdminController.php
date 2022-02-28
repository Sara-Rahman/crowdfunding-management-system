<?php

namespace App\Http\Controllers\admin;

use App\Models\Donor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    

    public function CreateDonation()
    {
        return view('website.donation.list');
    }

    
}
