<?php

class Messages
{
    // setMessage static function
    public static function setMessage($text, $type)
    {
        if ($type == 'error') {
            $_SESSION['errorMessage'] = $text;
        } else {
            $_SESSION['successMessage'] = $text;
        }
    }

    public static function display()
    {
        if (isset($_SESSION['errorMessage'])) {
            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errorMessage']. '</div>';
            unset($_SESSION['errorMessage']);
        } 
        
        if (isset($_SESSION['successMessage'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['successMessage'] . ' </div>';
            unset($_SESSION['successMessage']);
        }
    }
}