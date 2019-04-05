<?php
   if (isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      $file_target = "$target_dir/{$_FILES["file"]["name"]}";
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      
      $extensions= array("jpeg","jpg","png", "txt");
      
      if (in_array($file_ext,$extensions)=== false){
         $errors[]="Valid file formats: " . $extensions;
      }
      
      if ($file_size > 5000000) {
         $errors[]='File size cannot exceed 5 MB';
      }
      if (empty($errors)==true && $file_type == "image/jpeg") {
         move_uploaded_file($file_tmp,"files/".$file_name);
         header("Content-type: image/jpg");
         readfile($file_target);
      } elseif (empty($errors)==true && $file_type == "image/png") {
         move_uploaded_file($file_tmp,"files/".$file_name);
         header("Content-type: image/png");
         readfile($file_target);
      } elseif (empty($errors)==true && $file_type == "text/plain") {
         move_uploaded_file($file_tmp,"files/".$file_name);
         header("Content-type: text/plain");
         readfile($file_target);
      } else {
         print_r($errors);
      }
   }
?>