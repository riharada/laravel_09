<!--<!DOCTYPE html>-->
<!--<html>-->
<!--  <head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta http-equv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    
<!--    <title>MyProfile</title>-->
<!--  </head>-->
<!--  <body>-->
<!--    <h1>自己紹介</h1>-->
<!--  </body>-->
<!--</html>-->

{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.php@yield('title)に'Myプロフィール'を埋め込む --}}
@section('title','Myプロフィール')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-md-8 mx-auto">
       <h2>Myプロフィール</h2>
     </div>
   </div>
 </div>
@endsection