<?php require_once('header.php'); ?>
<div class="container">
    <form id="newShowForm" action="add-anime-process.php" method="post">
        <div class="row">
            <h1>Add New Show</h1>
        </div>

        <div class="row">
            <div class="col-12 col-md-4">
                <label>
                    Name: 
                    <input type="text" class="full-width" name="showName" required>
                </label>
            </div>
            <div class="col-12 col-md-4">
                <label>
                    Description: 
                    <textarea class="full-width" name="showDesc" id="" oninput="autoHeight()" required></textarea>
                </label>
            </div>
            <div class="col-12 col-md-4">
                <label>
                    Airing?: 
                    <input name="isAiring" id="checkboxAiring" type="checkbox">
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4">
                <label>
                    Start Date: 
                    <input class="full-width" name="startDate" type="date" name="" id="" required>
                </label>
            </div>
            <div  class="col-12 col-md-4">
                <label id="endDateCont">
                    End Date: 
                    <input class="full-width" name="endDate" type="date" name="" id="endDate" required>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4">
                <label>
                    Genre: 
                    <select class="full-width" name="showCat" id="" required>
                        <option value="">Something</option>
                    </select>
                </label>
            </div>
            <div class="col-12 col-md-4">
                <label>
                    Studio:
                    <select class="full-width" name="showStu" id="" required>
                        <option value="">Something else</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label>
                    Image name:
                    <input class="full-width" type="text" name="image" id="" required>
                </label>
            </div>
            <div class="col-12">
                <input type="submit" value="Add Anime">
            </div>
        </div>
    </form>
</div>

<?php require_once('footer.php'); ?>