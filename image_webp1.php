
<?php
// this function allows you upload multiple images, convert them into WebP format and save them
// function returns array of names
// some part of script are from https://www.w3schools.com/ - Thanks a lot for saving our time!

Function photo_up($file) {

  $images = array();

  // Count # of uploaded files in array
$total = count($file['tmp_name']);
// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

    $target_dir = $_SERVER["DOCUMENT_ROOT"] . '/uploads/';
    $target_file = $target_dir . basename($file["name"][$i]);
    $uploadOk = 1;
    $imageFileType = $file['type'][$i];

    // Check file size
    if ($file["size"][$i] > 500000) {
        $msg =  "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg") {
        $msg = "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }



    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"][$i], $target_file)) {
            $msg = "The file ". basename( $file["name"][$i]). " has been uploaded.";
        } else {
            $msg = "Sorry, there was an error uploading your file.";
        }
    }

    $photo_name = $file["name"][$i];

    $file_to = $target_dir . $photo_name . ".webp";

    if ($imageFileType == "image/jpg") {

      $img = imagecreatefromfile($target_file);
      unlink($target_file);
      imagewebp($img, $file_to, 50);
      imagedestroy($img);

    } elseif ($imageFileType == "image/png") {

      $img = imagecreatefrompng($target_file);
      unlink($target_file);
      imagewebp($img, $file_to, 50);
      imagedestroy($img);


    } elseif ($imageFileType == "image/jpeg") {

      $img = imagecreatefromjpeg($target_file);
      unlink($target_file);
      imagewebp($img, $file_to, 50);
      imagedestroy($img);

    } elseif ($imageFileType == "image/gif") {

      $img = imagecreatefromgif($target_file);
      unlink($target_file);
      imagewebp($img, $file_to, 50);
      imagedestroy($img);

    } else {

      $img = imagecreatefromfile($target_file);
      unlink($target_file);
      imagewebp($img, $file_to, 50);
      imagedestroy($img);

    }

    $images[] = $photo_name . ".webp";


}


  return $images;

}

?>
