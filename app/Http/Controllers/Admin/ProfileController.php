<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

use App\Profile_History;

use Carbon\Carbon;

class ProfileController extends Controller
{
    //add, create, edit, updateを追加
    public function add()
    {
       return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
      
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // データベースに保存する
      $profile->fill($form);
      $profile->save();
      
      return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
     //Profile Modelからデータを取得する
    $profile = Profile::find($request->id);
    if (empty($profile)) {
      abort(404);
    }
     return view('admin.profile.edit',['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
      //validationをかける
     $this->validate($request, Profile::$rules);
     //Profile Modelからデータを取得
     $profile = Profile::find($request->id);
     //送信されてきたフォームデータを格納
     $profile_form = $request->all();
     
    //該当するデータを上書きして保存
    $news->fill($profile_form)->save();
    
    //以下追記
    $profile_history = new Profile_History;
    $profile_history->profile_id = $profile->id;
    $profile_history->edited_at = Carbon::now();
    $profile_history->save();
    
     return redirect('admin/profile/');
    }
    
    
}
