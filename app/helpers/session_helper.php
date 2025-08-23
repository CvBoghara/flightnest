<?php
session_start();

// Redirect function
function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
}
