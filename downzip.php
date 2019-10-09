<?php
// This function will zip all your files and Delete them from your /uploads/ folder
// $file_names must be array like - (test.txt, func.php, kote.pdf and etc.)
// $archive_file_name - any name, which you want to give your .Zip
// $file_path - Folder, where your files ($file_names) are located
function zipFiles($file_names,$archive_file_name,$file_path)
{
        //echo $file_path
    $zip = new ZipArchive();
    //create the file and throw the error if unsuccessful
    if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
        exit("cannot open <$archive_file_name>\n");
    }
    //add each files of $file_name array to archive
    foreach($file_names as $files)
    {
        $zip->addFile($file_path.$files,$files);
        //echo $file_path.$files,$files."

    }
    $zip->close();

    $target_dir = $_SERVER["DOCUMENT_ROOT"] . '/uploads/';

    foreach($file_names as $files) {
        unlink($target_dir . $files);
    }

}
?>
