<!DOCTYPE HTML>
<html>

<head>
</head>

<body>
    <?php
        include 'func.php';
        sessionStatusRedirect();
    ?>

    <p>Upload Text</p>
    <form action="post_text.php" method="post">
        <input type="text" name="name"/>
        <input type="submit" name="submit"/>
    </form>

    <BR><BR><BR>

    <p>Upload Image</p>
    <form action="post_image.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" accept="image/*"/>
        <input type="submit" name="submit"/>
    </form>

</body>

</html>
