<?php
if(isset($_POST['submit'])){
    $username = $_REQUEST ['username'];
    $password = $_REQUEST ['password'];



}

    function get_credentials_from_file($path) {
        $fp = fopen($path, 'r');
        while ($line = fgetcsv($fp)) {
            $lines[] = $line;
        }
        fclose($fp);
    
        return $lines;
    }
    
    $credentials = get_credentials_from_file('../storage/users.csv');


echo '<script type="text/javascript"> window.open("../dashboard.php","_self");</script>';

?>



