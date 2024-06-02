<?php

$conn = mysqli_connect("localhost:4411", "root", "", "login");

if (!$conn) {
    echo "Connection Failed";
}