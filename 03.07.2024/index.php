<?php
// 1.verilən hərf sözün daxilində işlənibsə ekrana herflerin sayi çıxsın
// $text="Hello World";
// $text2=strtolower($text);
// echo substr_count($text2, "l");


// 2.verilən hərf sözün daxilində işlənibsə ekrana bəli əks halda xeyr çıxsın
// $text="Hello World";
// $text2=strtolower($text);
// if(substr_count($text2, "h")){
//     echo "Beli";
// }else{
//     echo "Xeyr";
// }


// 3.array yalnız cüt ədədlərdən ibarət olmalıdır, əgər şərt ödənmirsə yəni tək ədədə rast gəlirsizsə ekrana xeyr yazılsın əks halda bəli
// $arr=[2, 4, 6, 7, 10, 12];
// $bool = true;
// foreach ($arr as $array) {
//     if ($array % 2 !== 0) {
//         $bool = false;
//     }
// }
// if ($bool) {
//     echo "Bəli";
// } else {
//     echo "Xeyr";
// }


// 4)arrayin icindeki elementleri 2 vahid artiraraq cap et meselen:
// [1,2,3,4,5] bu arrayi yeni belə arraya çevir [3,4,5,6,7]
// $arr=[1,2,3,4,5];
// for($i=0; $i<count($arr); $i++){
//     $arr[$i]+=2;
//     echo $arr[$i]. " ";
// }


// 5)arrayin en boyuk elementi olmadan elementlerinin cemini tap
// [1,2,3,4,5] 1+2+3+4-un cemi yeni maximum element olmadan(hazır max funksiyasindan istifadə etmədən)
// $arr=[1,2,3,4,5];
// $array=0;
// for ($i=0; $i <count($arr)-1 ; $i++) { 
//     $array+=$arr[$i];
// }
// echo $array;

?>