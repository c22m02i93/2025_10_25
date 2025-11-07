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
<title>Архиерей</title>

</head>
<body>

<?
include 'golova.php';

include 'menu.php';


?>

<h1>Архиерей</h1>
<a href="arhierei.php">Биография</a><br />
<a href="slovo_padre.php">Слово архипастыря</a><br />
<a href="raspisanie.php">Служение</a><br />

<?
include 'footer.php';
?>

</body>
</html>