<?php

if(!$_SESSION['ses_isLoggedIn']) {
    header("location:index.php?msg=Cheating...");
}

