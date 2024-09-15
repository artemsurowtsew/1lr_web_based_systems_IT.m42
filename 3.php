<?php  header("Content-Type: area/html; charset=windows-1251"); 
 class Coor{

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

$object = new Coor("Nick","nick2005@gmail.com","nickAreB3st0505"); //creating “Coor” object

$object->Getdata(); //function call

unset($object);

?>
