<?php
extract($_POST);
extract($_GET);
extract($_SERVER);
extract($_ENV);
extract($_COOKIE);

include "connector.php";

if (is_numeric($msg))
    {
    $current_date = date('Y-m-d H:i:s');
    if ($msg==0) { $error_stat=1; } else { $error_stat=0; }
    $ins = mysql_query("INSERT INTO plotter (date, sample_id, status) VALUES ('$current_date', '$msg', '$error_stat') ");
    echo "$current_date $msg $error_stat";
    }
?>
