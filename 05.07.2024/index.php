<?php
// - Bir array yaradın və içərisinə 5 fərqli ad əlavə edin .
$arr=["Nise", "Lale", "Meley", "Arzu", "Nigar"];


// - Array-dən 2-ci adı "Samir" olaraq yeniləyin.
// $arr[1]="Samir";
// print_r($arr);

// - Array-dən 4-cü elementi silin.
// unset($arr[3]);
// print_r($arr);

// - Array-də neçə element olduğunu tapın və ekrana sayını yazdırın
// $count=0;
// for($i=0; $i<count($arr); $i++){
//    $count++;
// }
// echo $count;

// - foreach dövrünü istifadə edərək array-dən bütün elementləri ekrana yazdırın.
// foreach($arr as $array){
//     echo $array. "<br>";
// }
// - Array-də "Nurlan" adının olub olmadığını yoxlayın
// $name="Nurlan";
// $check=false;
// foreach($arr as $array){
//     if($array==$name){
//         $check=true;
//     }
// }
// if($check){
//     echo "Ad movcuddur";
// }else{
//     echo "Ad movcud deyil";
// }


// - İçərisində rəqəmlər olan bir array yaradın və bütün elementlərin toplamını hesablayın
// *****For ile*****
$array=[1,2,3,4,5,6,7,8,9];
// $sum=0;
// for($i=0; $i<count($array); $i++){
//     $sum+=$array[$i];
// }
// echo $sum;

// *****Funksiya ile*****
// print_r(array_sum($array));


// - İki fərqli array-i birləşdirərək yeni bir array yaradın
// $arr1=[1,2,3];
// $arr2=[4,5,6];
// print_r(array_merge($arr1, $arr2));
