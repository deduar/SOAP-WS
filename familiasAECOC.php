<?php

$file = new SplFileObject("./familiaAECOC.xml");

$i = 1;
while (!$file->eof()) {
    $data = $file->fgets();
    switch ($i){
        case 5:
            echo "Tema: ".strtolower(preg_replace('/\s+/', '-',stripAccents(trim($data))))."<br>";
            break;
        case 7:
            echo "Categoría: ".strtolower(preg_replace('/\s+/', '-',stripAccents(trim($data))))."<br>";
            break;
        case 9:
            echo "Sub-Categorias: ".strtolower(preg_replace('/\s+/', '-',stripAccents(trim($data))))."<br>";
            break;
        case 11:
            echo "Familia: ".strtolower(preg_replace('/\s+/', '-',stripAccents(trim($data))))."<br>";
            break;
        case 13:
            echo "------<br>";
            break;
    }
    $i++;
    if($i == 14){
        $i = 1;
    }
}

// Unset the file to call __destruct(), closing the file handle.
$file = null;


function stripAccents($str) {
    return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}
