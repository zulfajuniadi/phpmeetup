<?php

class UserController extends BaseController
{
  public function getList()
  {
    $userList = User::all();
    return View::make('userlist')
      -> with('users', $userList);
  }

  public function getInsert()
  {
    $user = new User;
    $user->email = 'zulfajuniadi@gmail.com';
    $user->password = Hash::make('password123');
    $user->is_admin = false;
    $user->save();

    return $user;
  }
}