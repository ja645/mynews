<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\HTML;
use App\Profile;

class ProfileController extends Controller
{
  public function index(Request $request)
  {
    $users = Profile::all()->sortByDesc('updated_at');
    
    return view('profile.index', ['users' => $users]);
  }
}
