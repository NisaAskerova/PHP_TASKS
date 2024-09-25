<?php

include "Car.php";
class Model extends Car{
    private string $model;

    public function __construct(string $car, string $model){
        $this->model = $model;
        parent::__construct($car);
    }
    public function getModel(): string{
        return $this->model;
    }
}
$model=new Model("BMW", "M5");
echo "Car: ".$model->car;
echo "<br>";
echo "Model: ". $model->getModel();