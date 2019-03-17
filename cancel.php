<?php
    /*
     * This php is for a user to cancel his requested processes
     */
    session_start();
    
    // get user's process's pid from session's record
    posix_kill($_SESSION["pid"], 9); // 9=SIGKILL(a const)

    echo "Process Terminated";
    $_SESSION["status"] = "new";
    $_SESSION["pid"] = "";
    header("Location: /index.php"); // redirect to index.php
    exit;
?>
