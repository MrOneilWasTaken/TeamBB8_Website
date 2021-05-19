<nav class="navbar navbar-expand-md navbar-light" style="background-color: #8AAFD5;position: relative">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if ($_SERVER['REQUEST_URI'] != $uri[1]) { ?>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" area-expanded="false">
                        Shows
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #D7A878">
                        <form method="post">
                            <input type="submit" class="dropdown-item" name="dropdownSubmit" value="ID">
                            <div class="dropdown-divider"></div>
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
                        <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" placeholder="Search..." autocomplete="off" required>
                        <div class="input-group-append">
                            <input type="submit" name="submit" id='searchbtn' value="Search" class="btn btn-info btn-lg rounded-0">
                        </div>
                    </div>
                </form>
                <div class="list-group" id="show-list" style="position: absolute;">

                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    //press enter to search 
    const input = document.getElementById('search');
    const button = document.getElementById('searchbtn');
    let elementSelect = 0;
    
    const item = document.getElementsByName('show');
    document.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            button.click();
        }

        
        if(event.keyCode === 9) {
            event.preventDefault();
            input.value = item[elementSelect];
        }

        if (event.keyCode === 40) {
            event.preventDefault();

            if (item.length == 1) {
                item[elementSelect].focus();

            } else {
                    elementSelect++;

                setTimeout(function() {
                    item[elementSelect].focus();
                }, 100);
            }

            if (item.length < elementSelect) {
                return;
            }

        }

    });
</script>

<style>
    a[name='show']:focus {
        background: #e0e0e0;
    }
</style>