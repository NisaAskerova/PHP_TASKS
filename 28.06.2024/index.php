<?php
// 1.çevrənin sahəsini hesablayan funksiya yazın(radius parametr olsun)
/*function cevre($radius){
    $pi=3.14159;
    $total=$pi*pow($radius,2);
    echo $total;
}
cevre(30);*/

// 2.adamin adi və soyadini yazdiqda onlari fullname kimi birlikdə göstərən funksiya yazin(Soyadini yazmasa error cixmasin,təkcə adini yazibsa Adi cixsin ekrana)
/*function person($name, $surName=''){
    $fullName="";
    if($surName){
        $fullName .= $name. " " . $surName;
        echo $fullName;
    }else{
        echo $name;
    }
}
person("Nise");*/

// 3.iki ededi birbirine bolun(sifira bolme etse ekrana sifira bolmek  olmaz erroru cixsin) (funksiya formasinda)
/*function multiplication($num1, $num2){
    $error="";
    if ($num1!==0 && $num2!==0){
        $total = $num1 / $num2;
        echo $total;
    }else{
       $error .= "sifira bolmek  olmaz";
       echo $error;
    }
  
}
multiplication(30,3);*/

// 4.3 ededden en boyuyunu ekrana cixaran funksiya yaradin
//  function bigNumber($a, $b, $c){
//  if($a>$b && $a>$c){
//      echo "En boyuk eded $a";
//  }elseif($b>$a && $b>$c){
//      echo "En boyuk eded $b";
//  }else{
//      echo "En boyuk eded $c";
//  }
//  }
//  bigNumber(10,10,8);

// 5.2 ededden kicik olani ekrana cixaran funksiya yaradin
/* function smallNumber($a,$b,$c){
    if($a<$b && $a<$c){
        echo "En kicik eded $a";
    }elseif($b<$a && $b<$c){
        echo "En kicik eded $b";
    }else{
        echo "En kicik eded $c";
    }
}
smallNumber(10,20,3);*/

// 6.sozun uzunlugu 6dan uzun olduqda ekrana "6dan cox simvol daxil etmek olmaz"erroru cixardan funksiya yazin
//  function textLend($txt){
// $error='';
//  if(strlen($txt)>6){
//      $error.= "6dan cox simvol daxil etmek olmaz";
//      echo $error;
//  }else{
//      echo  $txt;
//  }
//  }
//  textLend("Salam");


?>