<?php

// Her iki tapsiriqda arrayin elementlerine çatıb, ekrana vermək  lazimdir
// 1-ci tapsiriq.
// $users = [
// "name" => "Ayan",
// "hobbies" => [
// "football", "domino"
// ],
// ];

// $users = [
//     "name" => "Ayan",
//     "hobbies" => [
//         "football", "domino"
//     ],
// ];
// echo "Name- ". $users['name']."<br>";
// for($i=0; $i<count($users); $i++){
//     echo "Hobbies- ". $users["hobbies"][$i]."<br>";
// }



// 2-ci tapsiriq.
// $blogs = [
// [
// 'title' => 'How can i learn PHP',
// 'tags' => [
// 'php', 'learn', 'it', 'programming'
// ],

// 'creator' => [//
// 'name' => 'Janna',
// 'surname' => 'Smith'
// ],
// 'views' => [//
// [
// 'user' => 'Tom',
// 'ip' => '192.168.1.1'
// ],
// [
// 'user' => 'Bob',
// 'ip' => '192.168.1.2'
// ],
// [
// 'user' => 'Jon',
// 'ip' => '192.168.1.3'
// ],
// ],
// ],
// [
// 'title' => 'How can i learn JS',
// 'tags' => [
// 'js', 'learn', 'it', 'programming', 'frontend', 'backend'
// ],
// 'creator' => [
// 'name' => 'Huseyn',
// 'surname' => 'Kerimov'
// ],
// 'views' => [//
// [
// 'user' => 'Selim',
// 'ip' => '192.168.1.1'
// ],
// [
// 'user' => 'Bob',
// 'ip' => '192.168.1.2'
// ],
// [
// 'user' => 'Jon',
// 'ip' => '192.168.1.3'
// ],
// [
// 'user' => 'Elesger',
// 'ip' => '192.168.1.4'
// ],
// [
// 'user' => 'Elovset',
// 'ip' => '192.168.1.5'
// ],
// ],

// ],

// ];

// foreach ($blogs as $blog) {
//     echo  $blog['title'] . "<br>";
//     echo  implode(',', $blog['tags']) . "<br>";
//     echo  $blog['creator']['name'] . " " . $blog['creator']['surname'] . "<br>";
//     echo  "<br>";
//     foreach ($blog['views'] as $view) {
//         echo $view['user'] . " " .$view['ip'] . "<br>";
//     }
//     echo "<br>";
// }