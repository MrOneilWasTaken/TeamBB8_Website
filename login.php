<?php require_once('header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Admin Login</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-3 col-6">
            <form id="loginForm" action="loginProcess.php" method="post" class="border border-dark text-center my-5 mx-3 px-5">
                <div class="row pt-5 px-5">
                    <div class="col-12">    
                        <label class="float-left">Username:</label> <input class="float-right" type="text" name="username" id="">
                    </div>
                </div>
                <div class="row px-5 pt-3 pb-5">
                    <div class="col-12">
                        <label class="float-left" >Password:</label> <input class="float-right" type="password" name="password" id="">
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-12">
                        <input type="submit" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>