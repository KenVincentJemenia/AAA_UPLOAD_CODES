<?php
    if (isset($_POST['submit']))
    {
    $fileName = $_FILES['file']['name'];
    $fileTmpname = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('.jpg','.jpeg','.png','.pdf');

    if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($filesize < 500000){
                   $fileNameNew = uniqid('','true').".".$fileActualExt;
                   $fileDestination = 'uploads/'.$fileNameNew;
                   move_uploaded_file($fileTmpname, $fileDestination);
                header("Location: as.php?uploadsuccess");
                }else{
                    echo "error! file too big!";
                }

            }else{
                echo "there was an error uploading your file";
            }
     }else{
         echo "error! choose another format!";
     }
    }