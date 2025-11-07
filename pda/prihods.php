<?
if (isset($_REQUEST[session_name()])) session_start ();
$auth=$_SESSION['auth'];
$name_user=$_SESSION['name_user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?
include 'head.php';
?>
<title>Приходы</title>

</head>
<body>

<?
include 'golova.php';
include 'menu.php';


?>

<h1>Приходы</h1>

<?
$blag = $_GET['blag'];
$raion = $_GET['raion'];

echo '<p><a href="mon.php">Жадовский монастырь</a>.</p><br />';
if (empty($blag) && empty($raion)) {
echo '<ol>';
 mysql_connect("localhost", "host1409556", "0f7cd928"); 
		echo '<p><span class="title" style="color:#5A5A5A"><b>Соборы</b></span></p>';
$news_all = mysql_query("SELECT * FROM host1409556_barysh.prihods WHERE name LIKE '%Собор%' ORDER BY name");

	for ($tr=0; $tr<mysql_num_rows($news_all); $tr++)
{	$pr = mysql_fetch_array($news_all);
echo '<li><a href="prihod.php?id='.$pr[id].'">'.$pr[name].'</a>.</li>';
}

		echo '<br /><p><span class="title" style="color:#5A5A5A"><b>Храмы</b></span></p>';
$news_all = mysql_query("SELECT * FROM host1409556_barysh.prihods WHERE name LIKE '%Храм%' ORDER BY name");

	for ($tr=0; $tr<mysql_num_rows($news_all); $tr++)
{	$pr = mysql_fetch_array($news_all);
echo '<li><a href="prihod.php?id='.$pr[id].'">'.$pr[name].'</a>.</li>';
}
		echo '<br /><p><span class="title" style="color:#5A5A5A"><b>Часовни</b></span></p>';
$news_all = mysql_query("SELECT * FROM host1409556_barysh.prihods WHERE name LIKE '%Часовня%' ORDER BY name");

	for ($tr=0; $tr<mysql_num_rows($news_all); $tr++)
{	$pr = mysql_fetch_array($news_all);
echo '<li><a href="prihod.php?id='.$pr[id].'">'.$pr[name].'</a>.</li>';
}

		echo '<br /><p><span class="title" style="color:#5A5A5A"><b>Молитвенные дома и комнаты</b></span></p>';
$news_all = mysql_query("SELECT * FROM host1409556_barysh.prihods WHERE name LIKE '%дом %' OR name LIKE '%комната%' ORDER BY name");

	for ($tr=0; $tr<mysql_num_rows($news_all); $tr++)
{	$pr = mysql_fetch_array($news_all);
echo '<li><a href="prihod.php?id='.$pr[id].'">'.$pr[name].'</a>.</li>';
}

}

?>
</ol>

<?
include 'footer.php';
?>

</body>
</html>