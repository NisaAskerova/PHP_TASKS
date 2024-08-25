<?php
// 1.1dən 20e kimi ededelerin cemini tapın, 
$a=0;
for($i=1; $i<=20; $i++){
    $a+=$i;
}
echo $a. "<br>";


// 2.1den 20e kimi 4ə bölünən ədədlərin sayını tapın(diqqet:say)
// $count=0;
// for($i=0; $i<=20; $i++){
//     if($i % 4 === 0){
//         $count+=1;
       
//     }
// }
// echo $count;


// 3.Verilən stringin Palindrom  olub olmadığını tapan bir funksiya yazın ( for ilə )
//Forsuz.
// $text="212";
// $text2=strrev($text);
// if($text==$text2){
//     echo "Polindomdur";
// }else{
//     echo "Polindrome deyil";
// }

//For ile.
// $text="777";
// $reverse="";
// for($i=strlen($text)-1; $i>=0; $i--){
// $reverse.=$text[$i];
// }
// if($reverse===$text){
//     echo "Polindromdur";
// }else{
//     echo "Polindrome deyil";
// }

// 4. Verilən mətindəki saitlərin sayını hesablayan bir funksiya yazın
// $text="Nisə Əsgərova";
// $count=0;
// for($i = 0; $i < strlen($text); $i++){
//     if($text[$i]=="a" || $text[$i]=="e" || $text[$i]=="i" ||
//        $text[$i]=="ı" || $text[$i]=="ə" || $text[$i]=="ü" ||
//        $text[$i]=="u" ||  $text[$i]=="o" || $text[$i]=="ö" ){
//            $count++;
//         }
//     }
// echo $count;

// 5. Verilən ədədin rəqəmlərinin toplamını hesablayan kod (məs : 123 => 6)
// $a=0;
// for($i=0; $i<=3; $i++){
//     $a+=$i;
// }
// echo $a. "<br>";
?>