<nav class="navbar navbar-expand-md navbar-light" style="background-color: #8AAFD5;">
    <a class="navbar-brand" href="index.php"><img src="Logo.png" width="50" height="50" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if ($_SERVER['REQUEST_URI'] != $uri[1] &&  $_SERVER['REQUEST_URI'] != $uri[3]) { ?>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" area-expanded="false">
                        Shows
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #D7A878">
                        <form method="post">
                            <input type="submit" class="dropdown-item" name="dropdownSubmit" value="Alphabetical (asc)">
                            <div class="dropdown-divider"></div>
                            <input type="submit" class="dropdown-item" name="dropdownSubmit" value="Alphabetical (desc)">
                            <div class="dropdown-divider"></div>
                            <input type="submit" class="dropdown-item" name="dropdownSubmit" value="Producer">
                            <div class="dropdown-divider"></div>
                            <input type="submit" class="dropdown-item" name="dropdownSubmit" value="Genre">
                            <div class="dropdown-divider"></div>
                            <input type="submit" class="dropdown-item" name="dropdownSubmit" value="Ongoing">
                            <div class="dropdown-divider"></div>
                            <input type="submit" class="dropdown-item" name="dropdownSubmit" value="Year">
                            <div class="dropdown-divider"></div>
                            <input type="submit" class="dropdown-item" name="dropdownSubmit" value="Reset">
                        </form>
                    </div>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="watchlist.php">WatchList</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="donate.php">Donate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
            </li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="offset-xl-9 col-xl-3 col-12 pt-2 pb-1">
                <form action="results.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" placeholder="Search..." autocomplete="off">
                        <div class="input-group-append">
                            <input type="submit" name="submit" id='searchbtn' value="Search" class="btn btn-info btn-lg rounded-0">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>