<?php
extract($_POST);
extract($_GET);
extract($_SERVER);
extract($_ENV);
extract($_COOKIE);

include "connector.php";
echo "Log:";
echo "<table><tr><td align=right>ID&nbsp;|&nbsp;</td><td align=left>date</td><td align=right>sample ID&nbsp;|&nbsp;</td><td align=right>status</td></tr>";
$q = mysql_query("SELECT * FROM plotter ORDER BY id DESC");
while ($r = mysql_fetch_array($q))
{
if ($r[status]==1) { $r[status] = "<strong>error</strong>"; } else { $r[status] =""; }
echo "<tr>";
    echo "<td align=right>$r[id]&nbsp;|&nbsp;</td>";
    echo "<td align=right>$r[date]&nbsp;|&nbsp;</td>";
    echo "<td align=right>$r[sample_id]&nbsp;|&nbsp;</td>";
    echo "<td align=right>$r[status]</td>";
echo "</tr>";
}
echo "</table>";

if ($msg=="restart")
    {
    echo "restart";
    mysql_query("TRUNCATE TABLE plotter");
    }

?>

