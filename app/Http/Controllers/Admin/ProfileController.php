<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\History;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $repuest)
    {
        if (Profile::where('user_id', Auth::id())->exists()){
            return redirect('admin/' . Auth::id() . '/profile')->with('flash_message', 'プロフィールは存在します。');
        }
        
        $this->validate($repuest, Profile::$rules);
        $profile = new Profile;
        $form = $repuest->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        Auth::user()->profile()->save($profile);
        
        return redirect('admin/news/create');
    }
    
    public function edit($id)
    {
        $profile = Profile::find($id);
        
        //本人以外が編集できないようにする。
        if ($profile->user_id != Auth::id()){
            abort(404);
        }
        
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
    
    public function mypage(Request $request)
    {
        
        $profile = Auth::getUser()->profile()->first();
        
        //ここにNewsコントローラーのindexアクションをぶち込んだ
        $cond_title = $request->cond_title;
          if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Auth::getUser()->News()->where('title', $cond_title)->get();
          } else {
            //それ以外はすべてのニュースを取得する
            $posts = Auth::getUser()->News()->get();
          }
     
        return view('admin.profile.mypage', ['profile' => $profile, 'posts' => $posts, 'cond_title' => $cond_title]);
    
    }
    
}
