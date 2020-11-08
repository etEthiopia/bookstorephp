<?php 
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: login.html"); 
    exit; 
} 
echo 'Welcome, '.$_SESSION['username']; 
?> 