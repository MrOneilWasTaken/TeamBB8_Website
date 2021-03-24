<?php require_once('header.php'); ?>
<div class="container">
    <form action="add-anime-process.php" method="post">
        <div class="row">
            <h1>Add New Anime</h1>
        </div>

        <div class="row">
            <div class="col-12 col-md-4">
                <label>
                    Name: 
                    <input type="text" name="animeName">
                </label>
            </div>
            <div class="col-12 col-md-4">
                <label>
                    Description: 
                    <textarea name="animeDesc" id="" oninput="autoHeight()"></textarea>
                </label>
            </div>
            <div class="col-12 col-md-4">
                <label>
                    Airing?: 
                    <input name="isAiring" type="checkbox">
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4">
                <label>
                    Start Date: 
                    <input name="startDate" type="date" name="" id="">
                </label>
            </div>
            <div class="col-12 col-md-4">
                <label>
                    End Date: 
                    <input name="endDate" type="date" name="" id="">
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4">
                <label>
                    Genre: 
                    <select name="animeCat" id="">
                        <option value="">Something</option>
                    </select>
                </label>
            </div>
            <div class="col-12 col-md-4">
                <label>
                    Studio:
                    <select name="animeStu" id="">
                        <option value="">Something else</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label>
                    Image name:
                    <input type="text" name="image" id="">
                </label>
            </div>
            <div class="col-12">
                <input type="submit" value="Add Anime">
            </div>
        </div>
    </form>
</div>

<?php require_once('footer.php'); ?>