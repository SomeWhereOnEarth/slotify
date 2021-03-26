<?php

include("process.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Upload</title>

<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<link rel="icon" type="image/png" href="../img/images/logo.png">

<!-- Import lib -->
<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<!-- End import lib -->

<link rel="stylesheet" type="text/css" href="style/style.css">

</head>
<body>

    <body class="overlay-scrollbar">
        <!-- navbar -->
        <?php include "navbar.php"; ?>
        <!-- end nav right -->
        <!-- sidebar -->
        <?php include "sidebar.php"; ?>
        <!-- end sidebar -->
        <!-- main content -->
        <div class="wrapper">
            <div class="row">
                <div class="col-4 col-m-6 col-sm-6">
                    <div class="counter bg-primary">
                        <a href="upload/uploadArtist.php">
                            <p>
                                <h1><i class="fas fa-male"></i></h1>
                            </p>
                            <h1>Add new artist</h1>
                        </a>
                    </div>
                </div>
                <div class="col-4 col-m-6 col-sm-6">
                    <div class="counter bg-warning">
                        <a href="upload/uploadAlbum.php">
                            <p>
                                <h1><i class="fas fa-box"></i></h1>
                            </p>
                            <h1>Add new album</h1>
                        </a>
                    </div>
                </div>
                <div class="col-4 col-m-6 col-sm-6">
                    <div class="counter bg-success">
                        <a href="upload/uploadSong.php">
                            <p>
                                <h1><i class="fas fa-music"></i></h1>
                            </p>
                            <h1>Add new song</h1>
                        </a>
                    </div>
                </div>
            </div>
        

<!-- import script -->
<script src="admin.js"></script>
<!-- end import script -->
</body>
</html>