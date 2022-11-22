<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminAccessController extends Controller
{
    public function ApprovedUser($id){
        $user = User::findOrFail($id)->update(['role'=>'1']);
        return back();
    } //end method
    
    public function DeclineUser($id){
        $user = User::findOrFail($id)->delete();
        return back();
    } //end method
}
