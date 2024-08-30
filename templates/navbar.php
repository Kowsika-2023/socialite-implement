<div class="nav-menu">

    <nav class="navbar navbar-expand-md navbar-dark px-4 ">
        <a href="index.php" class="navbar-brand  ">
            <img src="./assets/img/logo.png" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end min-nav" id="navbarScroll">
            <ul class="navbar-nav navbar-nav-scroll nav_a">

                <li class="nav-item">
                    <a class="nav-link  <?php if ($file_name == "home") {
                                            echo "active";
                                        } ?>" aria-current="page" href="index.php">Home

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if ($file_name == "about") {
                                            echo "active";
                                        } ?>" aria-current="page" href="about.php">About us

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  <?php if ($file_name == "service") {
                                            echo "active";
                                        } ?>" aria-current="page" href="services.php">Services

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if ($file_name == "membership") {
                                            echo "active";
                                        } ?>" aria-current="page" href="membership.php">Membership

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if ($file_name == "contact") {
                                            echo "active";
                                        } ?>" aria-current="page" href="contact.php">Contact us

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-des" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#enquiry-popup">Get Quote

                    </a>
                </li>

            </ul>

        </div>
    </nav>


</div>