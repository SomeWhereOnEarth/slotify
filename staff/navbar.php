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
                <a href="../index.php">
                    <img src="assets/logo.png" alt="slotify logo" class="logo logo-light">
                    <img src="assets/logo.png" alt="slotify logo" class="logo logo-dark">
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
                        <img src="assets/001.jpg" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
                        <ul id="user-menu" class="dropdown-menu">
                                <li  class="dropdown-menu-item">
                                    <a href="../index.php" class="dropdown-menu-link">
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