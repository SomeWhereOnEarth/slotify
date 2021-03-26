<?php

include("../process.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Album</title>

<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<link rel="icon" type="image/png" href="../../img/images/logo.png">

<!-- Import lib -->
<link rel="stylesheet" type="text/css" href="../fontawesome-free/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<!-- End import lib -->

<link rel="stylesheet" type="text/css" href="../style/style.css">

</head>
<body>

    <body class="overlay-scrollbar">
        <!-- navbar -->
        <div class="navbar">
            <!-- nav left -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-bars" onclick="collapseSidebar()"></i>
                    </a>
                </li>
                <li class="nav-item">
                <a href="../../index.php">
                    <img src="../assets/logo.png" alt="slotify logo" class="logo logo-light">
                    <img src="../assets/logo.png" alt="slotify logo" class="logo logo-dark">
                </a>
                </li>
            </ul>
            <!-- end nav left -->
            <!-- nav right -->
            <ul class="navbar-nav nav-right">
                <li class="nav-item mode">
                    <a class="nav-link" href="#" onclick="switchTheme()">
                        <i class="fas fa-moon dark-icon"></i>
                        <i class="fas fa-sun light-icon"></i>
                    </a>
                </li>
                <li class="nav-item avt-wrapper">
                    <div class="avt dropdown">
                        <img src="../assets/001.jpg" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
                        <ul id="user-menu" class="dropdown-menu">
                                <li  class="dropdown-menu-item">
                                    <a href="../../index.php" class="dropdown-menu-link">
                                        <div>
                                            <i class="fas fa-sign-out-alt"></i>
                                        </div>
                                        <span>กดทำไมไม่รู้</span>
                                    </a>
                                </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- end nav right -->
        </div>
        <!-- end nav right -->
<!-- sidebar -->
<div class="sidebar">
            <ul class="sidebar-nav">
                <li class="sidebar-nav-item">
                    <a href="../home.php" class="sidebar-nav-link active">
                        <div>
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li  class="sidebar-nav-item">
                    <a href="../view.php" class="sidebar-nav-link">
                        <div>
                            <i class="fas fa-eye"></i>
                        </div>
                        <span>View</span>
                    </a>
                </li>
                <li  class="sidebar-nav-item">
                    <a href="../upload.php" class="sidebar-nav-link">
                        <div>
                        <i class="fas fa-upload"></i>
                        </div>
                        <span>Upload</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- end sidebar -->
        <div class="wrapper">
            <div class="row">
                <div class="col-12 col-m-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                Albums Lists
                            </h3>
                        </div>
                        <div class="card-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Album Name</th>
                                        <th>Artist</th>
                                        <th>Genre</th>
                                        <th>Artwork</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result9->num_rows > 0) {
                                        while($row = $result9->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["title"]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["genrename"]; ?></td>
                                        <td>
                                            
                                                <img src="../../<?php echo $row["artworkPath"]; ?>" style="width: 100px;">
                                            
                                        </td>
                                        <td><a href="../process.php?album_id=<?php echo $row["id"]; ?>" style="color: #000;">แก้ไข</a></td>
                                        <td><a href="../process.php?album_id=<?php echo $row["id"]; ?>" style="color: #000;">ลบ</a></td>
                                    </tr>
                                    <?php
                                      }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

<!-- import script -->
<script src="../admin.js"></script>
<!-- end import script -->
</body>
</html>