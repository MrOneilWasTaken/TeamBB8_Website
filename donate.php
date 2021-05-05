<?php require_once('header.php'); ?>

<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <h1>Donate</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <img src="img/donateCode.png" alt="Donate!" title="Donate now!">
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3 py-4">
            A small team of developers have worked hard on this project and are
            continuing to update it over time. By donating to our PayPal, you will
            be providing a slice of good will to our team, and will allow us to keep
            funding our efforts to work on small projects such as this. Thanks for
            donating! <br /> Love, Team BB-8
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="https://www.paypal.com/donate" method="post" target="_top">
                <input type="hidden" name="business" value="lewis.oxley98@outlook.com" />
                <input type="hidden" name="item_name" value="Donating funds to small development teams" />
                <input type="hidden" name="currency_code" value="GBP" />
                <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                <img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1" />
            </form>

        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>