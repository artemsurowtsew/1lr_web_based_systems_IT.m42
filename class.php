<?php header("Content-Type: text/html; charset=windows-1251"); class WorkWithFile 

{ public $buff; public $filename; 

function __construct($filename) 

{ 

 $uploaddir = './'; 

$this->filename = $uploaddir .$filename; 

if(!file_exists($this->filename)) exit("File does not exist"); 

//file openning

$fd = fopen($filename, "r"); 

if(!$fd) exit("File open error"); 

$this->buff = fread($fd,filesize($this->filename)); fclose($fd) ; 

} 

// The method displays the contents of the //file on the function screen 

function getContent() 

{ return $this->buff; 

} 

// The method displays the file size


// The method outputs the number of lines in the //function file 



} 


$first = new WorkWithFile("count.txt"); echo "{$first->getContent()}<br>"; 
 


?>  