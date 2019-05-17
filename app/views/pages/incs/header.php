<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ROOT ?>public/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">DMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
           
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT ?>"><i class="fas fa-file-pdf"></i> Add New Document <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="managedocuments"><i class="fas fa-folder-open"></i> Manage Document</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="staff"><i class="fas fa-folder-open"></i> Staff</a>
                </li>
                <?php
                @Session::init();
                if (@Session::get('loggedin')) :
                    echo '<li class="nav-item"><a class="nav-link" href="' . ROOT . 'logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>';
                else :
                    echo '<li class="nav-item"><a class="nav-link" href="' . ROOT . 'login"><i class="fas fa-sign-in-alt"></i> Login</a></li>';
                endif;
                ?>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">