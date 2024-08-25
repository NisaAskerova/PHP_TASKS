<?php
// 1.$fruits = ['apple', 'banana', 'cherry'];
// əgər arrayda "apple" varsa "orange" da əlavə olunsun,yoxdursa olmasin.
// $fruits = ['apple', 'banana', 'cherry'];
// if(in_array('apple', $fruits)){
//     $fruits[]='orange';
// }
// print_r($fruits);

// 2.$firstArray = [1, 2, 3];
// $secondArray = [4, 5, 6]; ikinci arraydaki elementleri birinciye köçürün (2üsulla:həm hazir funksiya ile hem forla)
// ******For ile******
// $firstArray = [1, 2, 3];
// $secondArray = [4, 5, 6];
// for($i=0; $i<count($secondArray); $i++){
//     $firstArray[]=$secondArray[$i];
// }print_r($firstArray);

// ********Funksiya ile*******
// $firstArray = [1, 2, 3];
// $secondArray = [4, 5, 6];
// $result=array_merge($firstArray, $secondArray);
// print_r($result);


// 3.$numbers = [1, 2, 3, 4, 5]; arrayin sonuncu elementini silin,ekrana həm yeni vəziyyətdə olan arrayi çıxardın
//(yəni $numbers = [1, 2, 3, 4],həm də silinmiş elementi(bu formada: "arraydan silinmiş element:5")
// $numbers = [1, 2, 3, 4, 5];
// $newNum=[];
// $delNum=array_pop($numbers);
// $newNum[]=$numbers;
// print_r($newNum);
// echo "<br> arraydan silinmiş element:";
// print_r($delNum);

// 4.$stack = ['a', 'b', 'c', 'd', 'e']; arrayin bütün elementlərini silin,
// boş arrayi print edin ve her dövrdə silinen elementleri ekrana çıxarın ("arraydan silinmiş element:e";"arraydan silinmiş element:d  və s."
// $stack = ['a', 'b', 'c', 'd', 'e'];
// $delArr=[];
// while(!empty($stack)){
//     echo "arraydan silinmiş element: ";
//     print_r($delArr);
//     $delArr[]=array_pop($stack);
//     echo '<br>';
// }
// 5.arrayden son 3 element silinsin,(istenilen sayda elementi olan arraydan),$numbers = [1, 2, 3, 4, 5]
// $numbers = [1, 2, 3, 4, 5, 6, 7, 8];
// $newNumber=[];
// for($i=0; $i<3; $i++){
//     array_pop($numbers);
// }print_r($numbers);

// 6.$person = [
//     'name' => 'John',
//     'age' => 30,
//     'city' => 'New York',
// ]; arrayda "age" keyi varsa "Johnun (x) yaşı var" ekrana çıxsın"(adı və yaşını manual özünüz əllə yazmayin,
// arrayin elementine çatılma qaydasi necədirsə o şəkildə)
// $person = [
//     'name' => 'John',
//     'age' => 30,
//     'city' => 'New York',
// ];
//    array_key_exists('age', $person);
//    array_key_exists('name', $person);
   
// echo $person['name']."un ". $person['age'], " yasi var";
 
// 7.$users = [
//     ['id' => 1, 'name' => 'John', 'age' => 30],
//     ['id' => 2, 'name' => 'Jane', 'age' => 25],
//     ['id' => 3, 'name' => 'Doe', 'age' => 35],
// ];
// butun userlerin ad ve yaslari cumle şəklində ekrana cixsin(johnun 30 yasi var ve s.)

// $users = [
//         ['id' => 1, 'name' => 'John', 'age' => 30],
//         ['id' => 2, 'name' => 'Jane', 'age' => 25],
//         ['id' => 3, 'name' => 'Doe', 'age' => 35],
//     ];

    // for($i=0; $i<count($users); $i++){
    //    array_key_exists('name', $users);
    //    array_key_exists('age', $users);
    //    echo $users[$i]['name'].'in '. $users[$i]['age']. ' yasi var.'. "<br>"; 

    // }

// 8.$student = [
//     'name' => 'Alice',
//     'grades' => [
//         'math' => 85,
//         'science' => 90,
//         'history' => 80,
//     ],
// ];
// telebenin her fen uzre ballarini ekrana cixarin "riyaziyyat fenninden 85" ve s.


// 9.hem array_map()-le hem de array walkla arrayin her elementinin üstüne 2 gelin, $array = [1, 2, 3, 4, 5];
// $array = [1, 2, 3, 4, 5];
// function sumArray ($sumarr){
//     return $sumarr+2;
// }
// $test=array_map('sumArray', $array);
// print_r($test);

// 10.array maple adlari Uppercase edin $names = ['alice', 'bob', 'charlie'];
// $names = ['alice', 'bob', 'charlie'];
// function upperArr($upper){
//   return strtoupper($upper);
// }
// $test=array_map('upperArr', $names);
// print_r($test);

// 11.array mapla iki arrayi cemleyin her elementini bir biri ile cemleyin $array1 = [1, 2, 3, 4, 5];
// $array2 = [10, 20, 30, 40, 50]; (netice bu olmalidir:Array
// (
//     [0] => 11
//     [1] => 22
//     [2] => 33
//     [3] => 44
//     [4] => 55
// )
// $array1 = [1, 2, 3, 4, 5];
// $array2 = [10, 20, 30, 40, 50];
// function sumArr($arr1, $arr2){
//     return $arr1+$arr2;
// }
// $summ=array_map('sumArr', $array1, $array2);
// print_r($summ);

// 12.array walkla her adin sonuna Smith soyadini elave edin $names = ['Alice', 'Bob', 'Charlie'];(netice:Array
// (
//     [0] => Alice Smith
//     [1] => Bob Smith
//     [2] => Charlie Smith
// )
// $names = ['Alice', 'Bob', 'Charlie'];

// array_walk($names, function(&$name) {
//     $name .= ' Smith';
// });

// print_r($names);
// 13.$person = [
//     'name' => 'John',
//     'age' => 30,
// ];  array walkla ad ve yasi modifikasiya edin ve elementler bu sekilde deyissin,qarsilarina user_ yazilsin)(netice:Array
// (
//     [name] => user_John
//     [age] => user_30
// )
// $person = [
//         'name' => 'John',
//         'age' => 30,
// ];
// function walkArr($val, $key, $med){
//     echo $key .$med. $val . "<br>";
// }
// array_walk($person, 'walkArr', ' => user_');