<?php

    function verify_session (){
        if(!isset($_SESSION['codigo'])){
            session_start();
            header("location: ../login/login.php?erro=true");
        }
    }