<?php
//elin
$target_dir = '../../uploads';//varibeln target_dir tilldelas med mappen uploads där den valda filen sparas för att laddas upp

$maxFileSize = 6000000; // ~ 6MB
//ifsatsen utförs om submitknappen är aktiverad.
if(isset($_POST["submit"])) {
    move_uploaded_file ($_FILES["file"]["tmp_name"], "$target_dir/{$_FILES["file"]["name"]}");
    $postedFile = "$target_dir/{$_FILES["file"]["name"]}";
    $fileName   = basename($_FILES["file"]["name"]);//hämtar filens namn
    $mimeType   = $_FILES["file"]["type"];// hämtar filens mimestorlek
    $fileSize   = $_FILES["file"]["size"];//hämtar filens storlek

    //om filensstorlek är större än max tillåtet skrivs felmeddelandet ut
   if ($fileSize > $maxFileSize) {
       echo "Fil $fileName storlek $fileSize är större än vad som är tillåtet: $maxFileSize bytes";
    } elseif ($mimeType == "text/plain") {
       header("Content-type: text/plain");
       readfile($postedFile);//om mimetypen är text/plain läses den valda filen
    } elseif ($mimeType == "image/jpeg") {
       header("Content-type: image/jpg");
       readfile($postedFile);//om mimetypen är image/jpg läses den valda filen
    } elseif ($mimeType == "image/png") {
       header("Content-type: image/png");
        readfile($postedFile);//om mimetypen är image/png läses den valda filen
    } else {
      echo "file name = " . $fileName . "\nmime type= ." . $mimeType . "\nfile size= " . $fileSize;//om mimetypen inte är någon av ovanstående skrivs endast filnamnet, mimetypen och filens storlek ut. Själva filen visas inte
    }
}

?>