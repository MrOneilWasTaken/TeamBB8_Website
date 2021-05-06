<?php 
session_save_path();
session_start();
require_once('functions.php');

$dbConn = getConnection();
if(isset($_SESSION['watchList'])) {
    foreach($_SESSION['watchList'] as $value)
    {
        $list = "SELECT * FROM ((shows 
        INNER JOIN category ON shows.showCat=category.catID)
        INNER JOIN studio ON shows.showStu=studio.stuID)
        WHERE showID = $value";

        $prepareList = $dbConn->prepare($list);
        $prepareList->execute();

        while($listRow = $prepareList->fetchObject()) {
            $item = $listRow->showName." | ".$listRow->catDesc." | ".$listRow->stuName."\n";

            if(isset($_POST['download'])) {
                $filename = "watchlist.txt";
                $flist = fopen($filename, 'w') or die("Error: Unable to open file");
                fwrite($flist,$item);
                fclose($flist);

                header('Content-Distribution: File Transfer');
                header('Content-Disposition: attachment; filename ='.basename($filename));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: '.filesize($filename));
                header('Content-Type: text/plain');
                readfile($filename);

            }
        }
    }
    unset($_SESSION['watchList']);
    
}  

?>