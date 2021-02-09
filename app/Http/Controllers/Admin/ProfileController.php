<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\History;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $repuest)
    {
        $this->validate($repuest, Profile::$rules);
        
        $profile = new Profile;
        $form = $repuest->all();
        
        unset($form['_token']);
        
        $profile->fill($form)->save();
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $repuest)
    {
        $profile = Profile::find($repuest->id);
        
        if (empty($profile)) {
            abort(404);
        }
        
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = Profile::find($request->id);
        
        $profile_form = $request->all();
        unset($profile_form['_token']);
        //dd($profile_form);
        $profile->fill($profile_form)->save();
        
        $history = new History;
        $history->news_id = 0;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        //プロフィール編集ページにリダイレクト
        return redirect()->action('Admin\ProfileController@edit', ['id' => $profile->id]);
    }
}
