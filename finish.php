<!DOCTYPE HTML>
<html>
<head>
</head>

<body>
<?php
    /*
     * This php is for displaying the result of our python code
     */
    include 'func.php';
    sessionStatusRedirect();

    echo "Process Finished";

    // if user request a new task
    if( $_SESSION["status"] == "finish" && isset($_GET["new"]) && $_GET["new"] == "new" )
    {
        $_SESSION["status"] = "new"; 
        echo "New Succeeded";
        header("Location: /index.php"); // redirect to index.php
    }
    else if( isset($_GET["new"]) ) // if something wrong
    {
        echo "Cannot New Now";
    }
?>

<!-- user click this button to request a new task -->
<form action="finish.php" method="get">
    <input type="submit" value="new" name="new"/>
</form>
</body>
</html>
