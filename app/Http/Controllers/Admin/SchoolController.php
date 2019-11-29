<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;

class SchoolController extends Controller
{

    public function index()
    {
        return view('admin.schools-list');
    }

    public function addForm()
    {
        return view('admin.school-add');
    }

    public function store(Request $req)
    {
        $attr = [
            'location.name' => 'location',
            'location.latlng' => 'latitude/longitude'
        ];
        $validatedData = $req->validate([
            'fullname' => 'bail|required|min:5|max:255',
            'mobile' => 'bail|required|numeric|digits_between:8,15|unique:users,mobile_num',
            'username' => ['bail', 'required', 'unique:users', 'min:5', 'max:255', 'regex:/^[A-Za-z][A-Za-z0-9]+$/i'],
            'password' => 'bail|required|min:6|max:50',
            'address' => 'bail|required|min:5|max:255',
            'location.name' => 'bail|required|min:6|max:255',
            'location.latlng' => ['bail', 'required', 'regex:/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/i'],
        ], [], $attr);


        var_dump($validatedData);
        // $school = new School;

        
    }
}
