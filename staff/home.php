<?php

include("process.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Overview</title>

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
                <div class="col-3 col-m-6 col-sm-6">
                    <div class="counter bg-primary">
                        <p>
                            <i class="fas fa-music"></i>
                        </p>
                        <h3>
                            <?php
                                    if ($result3->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result3->fetch_assoc()) {
                            ?>
                            <?php echo $row["id"]; ?>
                            <?php
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                            ?>
                        </h3>
                        <p>Music</p>
                    </div>
                </div>
                <div class="col-3 col-m-6 col-sm-6">
                    <div class="counter bg-warning">
                        <p>
                            <i class="fas fa-male"></i>
                        </p>
                        <h3>
                        <?php
                                    if ($result4->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result4->fetch_assoc()) {
                            ?>
                            <?php echo $row["id"]; ?>
                            <?php
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                            ?>
                        </h3>
                        <p>Artists</p>
                    </div>
                </div>
                <div class="col-3 col-m-6 col-sm-6">
                    <div class="counter bg-success">
                        <p>
                            <i class="fas fa-box"></i>
                        </p>
                        <h3>
                        <?php
                                    if ($result5->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result5->fetch_assoc()) {
                            ?>
                            <?php echo $row["id"]; ?>
                            <?php
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                            ?>
                        </h3>
                        <p>Albums</p>
                    </div>
                </div>
                <div class="col-3 col-m-6 col-sm-6">
                    <div class="counter bg-danger">
                        <p>
                            <i class="fas fa-list"></i>
                        </p>
                        <h3>
                        <?php
                                    if ($result6->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result6->fetch_assoc()) {
                            ?>
                            <?php echo $row["id"]; ?>
                            <?php
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                            ?>
                        </h3>
                        <p>Playlists</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 col-m-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                Music
                            </h3>
                        </div>
                        <div class="card-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Artist Name</th>
                                        <th>Songs Name</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result1->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result1->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["title"]; ?></td>
                                        <td>
                                            <span>
                                                <?php echo $row["duration"]; ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-m-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                Users
                            </h3>
                        </div>
                        <div class="card-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Register date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result2->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result2->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td><?php echo $row["signUpDate"]; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main content -->

<!-- import script -->
<script src="admin.js"></script>
<!-- end import script -->
</body>
</html>