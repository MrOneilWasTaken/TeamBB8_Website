<?php require_once('header.php');



if (getSession('logged-in')) { ?>

    <div class="container text-center">
        <div class="row m-0">
            <div class="alert alert-success col-12 my-3" role="alert">
                <div class="row m-0">
                    <div class="col-8 col-md-11">
                        <div class="h3-sm h5">Login successful:</div>
                        Welcome, Admin
                    </div>
                    <div class="col-4 float-right col-md-1 align-self-center">
                        <a type="button" href="logout.php" class="btn btn-outline-dark">
                            logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php

        $show = "SELECT * FROM ((shows 
        INNER JOIN category ON shows.showCat=category.catID)
        INNER JOIN studio ON shows.showStu=studio.stuID) ORDER BY showID";

        $prepShow = $dbConn->prepare($show);

        $prepShow->execute();
        ?>
        <div class="row text-center py-4">
            <div class="col-12">
                <h1>Please Choose a Show:</h1>
            </div>
        </div>
        <div class="row text-center m-0">
            <div class="col-12 col-md-4 border border-dark rounded">
                <a href="addShow.php" id="add-show">
                    <div class="row">
                        <div class="col-4 offset-4 align-self-center py-5">
                            <img src="img/plus.svg" class="full-width" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col display-4 display-5 text-center pt-5">
                            Add New Show
                        </div>
                    </div>
                </a>
            </div>
            <?php while ($showRow = $prepShow->fetchObject()) { ?>
                <div class="col-12 row-flex col-md-4 py-4">
                    <div class="content">
                        <div class="row">
                            <div class="col-6 offset-3">
                                <img class="img-thumbnail" src="img/<?= $showRow->showImage ?>" alt="<?= $showRow->showName ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <?= $showRow->showName ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <?= $showRow->catDesc ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <?= $showRow->stuName ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <?php if ($showRow->endDate == '0000-00-00' || $showRow->endDate == NULL) {
                                    $value = "Present";
                                } else {
                                    $value = $showRow->endDate;
                                } ?>
                                <?= $showRow->startDate ?> - <?= $value ?>
                            </div>
                        </div>
                        <div class="row pt-5 text-center">
                            <div class="col">
                                <a href="updateShow.php?showID=<?= $showRow->showID ?>" class="btn btn-orange">Edit</a>
                            </div>
                            <div class="col">
                                <form action="deleteShow.php?showID=<?= $showRow->showID ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this show?');">
                                    <input type="submit" class="btn btn-danger" value='Delete'>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
<?php require_once('footer.php');
} else {
    header('Location: login.php');
} ?>