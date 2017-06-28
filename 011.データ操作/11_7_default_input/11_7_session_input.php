<?php

session_start();

foreach ($_POST as $key => $value) {
    echo $key . " : " . $value . "<br>";
    $_SESSION[$key] = $_POST[$key];
}