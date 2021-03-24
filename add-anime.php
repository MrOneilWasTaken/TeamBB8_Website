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
                    <input type="text">
                </label>
            </div>
            <div class="col-12 col-md-4">
                <label>
                    Description: 
                    <textarea name="" id="" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'></textarea>
                </label>
            </div>
            <div class="col-12 col-md-4">
                <label>
                    Airing?: 
                    <input type="checkbox">
                </label>
            </div>
            <div class="col-12">
                <label>
                    Start Date: 
                    <input type="date" name="" id="">
                </label>
            </div>
            <div class="col-12">
                <label>
                    End Date: 
                    <input type="date" name="" id="">
                </label>
            </div>
            <div class="col-12">
                <label>
                    Genre: 
                    <select name="" id="">
                        <option value="">Something</option>
                    </select>
                </label>
            </div>
            <div class="col-12">
                <label>
                    Studio:
                    <select name="" id="">
                        <option value="">Something else</option>
                    </select>
                </label>
            </div>
            <div class="col-12">
            <label>
                Image name:
                <input type="text" name="" id="">
            </label>
            </div>
            <div class="col-12">
                <input type="submit" value="Add Anime">
            </div>
        </div>
        
    </form>
</div>

<?php require_once('footer.php'); ?>