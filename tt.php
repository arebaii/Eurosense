<?php
error_reporting(E_ALL);
if(!empty($_GET['choix']))
{
echo 'Les valeurs des cases cochées sont :<br />';
foreach($_GET['choix'] as $val)
{
echo $val,'<br />';
}
echo '<br />
Faire un autre test : <a href="checkbox3.php">Tester à nouveau</a>';
}
else
{
echo 'Test de récupération dans le cas de checkbox multiple
<br /><br />
<form method="GET" action="tt.php">
    <input type="checkbox" name="choix[]" value="1"> nom 1<br>
    <input type="checkbox" name="choix[]" value="2"> nom 2<br>
    <input type="checkbox" name="choix[]" value="3"> nom 3<br>
    <input type="checkbox" name="choix[]" value="4"> nom 4<br>
    <input type="checkbox" name="choix[]" value="5"> nom 5<br>
    <input type="submit" value="test">
</form>';
}
?>
