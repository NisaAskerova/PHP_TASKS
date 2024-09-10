<?php

abstract class Isciler{
    public int $salary;
    public string $name;

    public  function __construct( $name, $salary ){
        $this->name=$name;
        $this->salary=$salary;
    }

    public function info(){
        return "Isci adi:". $this->name. "<br>". "Ilkin maasi: $this->salary $";
    }

    abstract function bonus();

}
trait Tax{
  public function taxx(){
    $this->salary-=$this->salary *0.1;
  }
}

trait Bonus{
    public function bonus(){
        $this->salary+=$this->salary *0.2;
    }
}

class Total extends Isciler{
    use Tax, Bonus;
        public function __construct($name, $salary){
            parent::__construct($name, $salary);
        }
}

$isci=new Total("Nisa", 1000);
echo "Evvelki Maas:". $isci->salary. "$". "<br>";
$isci->taxx();
$isci->bonus();
echo "Sonraki Maas:". $isci->salary. "$";
