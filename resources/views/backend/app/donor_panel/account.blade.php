@extends('backend.layouts.app')
@section('title','My account')
@section('content')
<h1 class="title"> <span></span> Profile Page </h1>
<section class="profile-container">
<form action="" method="post" enctype="multipart/form-data">
@csrf
      <div class="flex">
         <div class="inputBox">
            <span>username : </span>
            <input type="text" name="name" required class="box" placeholder="enter your name" value="">
         </div>
        
      </div>
      <div class="flex-btn">
         <input type="submit" value="" name="" class="btn">
      </div>
   </form>
</section>
@endsection
