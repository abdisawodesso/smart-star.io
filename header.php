<?php

ini_set('display_errors', 1); // see an error when they pop up
error_reporting(E_ALL); // report all php errors
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $page_title; ?></title>

        <!-- Bootstrap CSS -->
        <link href="library/css/bootstrap.css" rel="stylesheet" media="screen" />
        <link href="library/css/bootstrap.min.css" rel="stylesheet">
        <script src="library/js/bootstrap.min.js"></script>

        <!-- some custom CSS -->
        <style>
            .left-margin{
                margin:0 .5em 0 0;
            }

            .right-button-margin{
                margin: 0 0 1em 0;
                overflow: hidden;
            }
        </style>
    </head>

    <body>

        <!-- container -->
        <div class="col-md-3">
        </br>
        </div>
        <div class="container col-md-6">
            <?php
                 // show page header
                 echo "<div class='page-header btn-group-justified btn btn-warning'>";
                 echo "<h1>{$page_title}</h1>";
                 echo "</div>  </br> </br>";
                
            ?>



