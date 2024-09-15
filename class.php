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

function removeFirstAndLastLine()
{
    // Читаємо файл як масив рядків
    $lines = file($this->filename);

    // Якщо файл має більше 2-х рядків
    if (count($lines) > 2) {
        // Видаляємо перший і останній рядок
        array_shift($lines); // Видаляє перший елемент
        array_pop($lines);   // Видаляє останній елемент

        // Записуємо оновлений масив рядків назад у файл
        file_put_contents($this->filename, implode("", $lines));

        echo "First and last lines removed successfully.<br>";
    } else {
        echo "File has less than 3 lines, can't remove first and last line.<br>";
    }
}
}


$object = new WorkWithFile("count.txt");

// Виведення вмісту файлу до змін
echo "<p>Before changes:</p>";
echo "{$object->getContent()}<br>";

// Видалення першого і останнього рядків
$object->removeFirstAndLastLine();

// Виведення вмісту файлу після змін
$object = new WorkWithFile("count.txt"); 
echo "<p>After changes:</p>";
echo "{$object->getContent()}<br>";
?>