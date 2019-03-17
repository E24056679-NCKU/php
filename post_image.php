<!DOCTYPE HTML>
<html>
<head>
    <script>
        // after upload succeeded, redirect to "waiting.php" in 5sec
        setTimeout(function(){
            window.location.href = "/waiting.php";
        }, 5000);
    </script>
</head>

<body>
    <?php
    include 'func.php';
    sessionStatusRedirect();


    // -----------------------------------------------------------
    // copy from https://www.w3schools.com/php/php_file_upload.asp
    $target_dir = "uploads/";

    // prepend session_id() to filename, in order to prevent same filename from different user 
    $target_file = $target_dir . session_id() . "_" .  basename($_FILES["fileToUpload"]["name"]);
    
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . "." . "<BR>";
            $uploadOk = 1;
        } else {
            echo "File is not an image." . "<BR>";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists." . "<BR>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large." . "<BR>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed." . "<BR>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded." . "<BR>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded." . "<BR>";
        } else {
            echo "Sorry, there was an error uploading your file." . "<BR>";
        }
    }
    // -----------------------------------------------------------


    if( $uploadOk )
    {
        $pyname = "test.py"; // set python script's name
        $arg0 = $pyname;
        $arg1 = "image"; // set 1st argument
        $arg2 = $target_file; // 2nd argument

        // call system command to run python script
        $pid = exec("python3 " . $pyname . " " . $arg1 . " " . $arg2 . " > /dev/null 2>&1 & echo $!", $ret);

        $_SESSION["status"] = "waiting";
        $_SESSION["pid"] = $pid;

        echo "python3 " . $arg0 . " " . $arg1 . " " . $arg2 . " > /dev/null 2>&1 & echo $!"; // record command
        echo "<br>";

        echo "Process PID : " . $pid;
        echo "<br>";
    }
?>
</body>
</html>
