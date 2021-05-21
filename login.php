<?php require_once('header.php'); ?>

<?php if (getSession('errors')) { ?>
    <div class="container pt-3">
        <div class="row alert alert-danger">
            <div class="col-12">
                <h3>Error: </h3>
                <?php echo getSession('errors'); ?>
            </div>
        </div>
    </div>
<?php } ?>

<div id="adminLogin" class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1 id="adminTitle">Admin Login</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-3 col-12 col-md-6">
            <form id="loginForm" action="loginProcess.php" method="post" class="border border-dark text-center my-5 mx-3 px-5">
                <div class="row pt-5 px-md-5">
                    <div class="col-12">
                        <label id="usernameLabel" class="float-md-left">Username:</label> <input class="float-md-right full-width" type="text" name="username" id="">
                    </div>
                </div>
                <div class="row px-md-5 pt-3 pb-5">
                    <div class="col-12">
                        <label id="passwordLabel" class="float-md-left">Password:</label> <input class="float-md-right full-width" type="password" name="password" id="">
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="Login">
                        <a href="index.php" class="btn btn-secondary">< Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>