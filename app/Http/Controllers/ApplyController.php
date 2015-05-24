<?php namespace App\Http\Controllers;

class ApplyController extends Controller {
public function upload() {


    $allowed =  array('xml');
    $filename = $_FILES['userfile']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed) ) {
        echo 'error';
    }
      echo "stringa1";

    // if ($_FILES['userfile']['type']!="xml") {
    //   echo $_FILES['userfile']['type'];
    //   return;
    // }
      echo "stringa1";

      $uploaddir = './';
      $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

      echo '<pre>';
      if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
          echo "File is valid, and was successfully uploaded.\n";
      } else {
          echo "Possible file upload attack!\n";
      }

      echo 'Here is some more debugging info:';
      print_r($_FILES);

      print "</pre>";

    }

}