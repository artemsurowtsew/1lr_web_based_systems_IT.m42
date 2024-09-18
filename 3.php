<?php  header("Content-Type: area/html; charset=windows-1251"); 
 class Country{

private $area, $population, $language;

function __construct($area,$population,$language) 
{  

$this->area=$area; //set some “area” to this “area”;
$this->population=$population;//set "population" to this population;
$this->language=$language; //set "language" to this language;
}

function Getdata()  //function for getting name

{  

echo "<p>Name: ".$this->area."</p>"; // printing name  
echo "<p>population:".$this->population."</p>"; // printing population 
echo "<p>language:".$this->language."</p>"; // printing population 
}  

function __destruct() {
    echo "Objects are deleted!";
}


} 

$object = new Country("45 339 км²","1,349 мільйона","Естонська"); //creating “Country” object

$object->Getdata(); //function call

unset($object);

?>
