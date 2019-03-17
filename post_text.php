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
	echo "<br>";

	if( isset($_POST["name"]) )
	{
		echo "Text : " . $_POST["name"];
		echo "<br>";

        $pyname = "test.py"; // set python script's name
        $arg0 = $pyname;
        $arg1 = "text"; // set 1st argument
        $arg2 = $_POST["name"]; // 2nd argument

        // call system command to run python script
        $pid = exec("python3 " . $pyname . " " . $arg1 . " " . $arg2 . " > /dev/null 2>&1 & echo $!", $ret);

        $_SESSION["status"] = "waiting";
        $_SESSION["pid"] = $pid;

        echo "python3 " . $arg0 . " " . $arg1 . " " . $arg2 . " > /dev/null 2>&1 & echo $!";
        echo "<br>";

        echo "Process PID : " . $pid;
        echo "<br>";
	}
?>
</body>
</html>
