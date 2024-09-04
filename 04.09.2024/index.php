<?php

include "QueryBuilder.php";
include "User.php";
$users = User::get(['id', "name", "email"], User::FETCH_ALL, "name LIKE '%n%'");
$userCount = User::usersCount();
// print_r($users);

// $new_user = User::insert([
//     'name'=>'Nisaa',
//     'email'=>'nisa9@gmail.com',
//     'password'=>'111'
// ]);

// print_r($new_user);


// $updateUser = User::update([
//     'name' => 'Nise',
//     'email' => 'nisa9@gmail.com',
//     'password' => '111'
// ], 'id=46');
// print_r($updateUser);

//$deleteUser= User::delete('id=43');

$userFind=User::find(39);
print_r($userFind);