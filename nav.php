<nav class="navbar navbar-expand-md navbar-light" style="background-color: #8AAFD5;">
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
                        <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" placeholder="Search..." autocomplete="off">
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
    input = document.getElementById("search");

    function autocomplete(inp, arr) {

        var currentFocus;

        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;

            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;

            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");

            this.parentNode.appendChild(a);

            for (i = 0; i < arr.length; i++) {

                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {

                    b = document.createElement("DIV");

                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);

                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";

                    b.addEventListener("click", function(e) {

                        inp.value = this.getElementsByTagName("input")[0].value;

                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });

        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                } 
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }

        document.addEventListener("click", function(event) {
            closeAllLists(event.target);
        });
    }

    autocomplete(input, <?= json_encode($showList) ?>);
</script>


<style>
    .autocomplete {
        /*the container must be positioned relative:*/
        position: relative;
        display: inline-block;
    }

    input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
    }

    input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
    }

    .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: #e6e3e3 !important;
        color: #000;
    }
</style>