<?php

$target_dir = "uploads/";
$file_size_limit = 6000000; // ~6MB
$file_upload = "$target_dir/{$_FILES["file"]["name"]}";
move_uploaded_file ($_FILES["file"]["tmp_name"], $file_upload);
$file_size = $_FILES["file"]["size"];
$mime_type = $_FILES["file"]["type"];
$file_name   = basename($_FILES["file"]["name"]);

if (isset($_POST["submit"])) {
   
    if ($file_size_limit < $file_size) {
       echo "The file you uploaded exceeds the limit. Your file is " . $file_size . "bytes. The file cannot exceed" . $file_size_limit . "bytes";
    } elseif ($mime_type == "image/png") {
        header("Content-type: image/png");
        readfile($file_upload);
    } elseif ($mime_type == "image/jpeg") {
        header("Content-type: image/jpeg");
        readfile($file_upload);
    } elseif ($mime_type == "text/plain") {
        header("Content-type: text/plain");
        readfile($file_upload);
    } else {
        echo "Cannot display file. \n File name: " . $file_name . "\n File size (bytes): " . $file_size . "\n File type: " . $mime_type;
    }

    }

?>