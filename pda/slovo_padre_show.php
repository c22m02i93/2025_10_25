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
  $data= $_GET['data'];
  $enter= $_GET['enter'];
$msg = $_GET['msg'];
$name = $_GET['name'];

mysql_connect("localhost", "host1409556", "0f7cd928"); 
mysql_query("SET NAMES 'cp1251'");
$news_all = mysql_query("SELECT * FROM host1409556_barysh.padre WHERE data = '$data'");
$news = mysql_fetch_array($news_all); 

if ($enter || $auth == 1) {
$views = $news[views];
}
else {
$views = $news[views]+1;
mysql_query("UPDATE host1409556_barysh.padre SET views = '$views' WHERE data = '$data'");
};
?>
<title><? echo $news[tema];?> - Слово архипастыря</title>

</head>
<body>

<?
include 'golova.php';

include 'menu.php';


?>


<h1>Слово архипастыря</h1>
 <?   
$news_all = mysql_query("SELECT * FROM host1409556_barysh.padre WHERE data = '$data'");
$news = mysql_fetch_array($news_all); 

$dtn = $news[data]; 
$yyn = substr($dtn,0,4); // Год
$mmn = substr($dtn,5,2); // Месяц
$ddn = substr($dtn,8,2); // День

// Переназначаем переменные
if ($mmn == "01") $mm1n="января";
if ($mmn == "02") $mm1n="февраля";
if ($mmn == "03") $mm1n="марта";
if ($mmn == "04") $mm1n="апреля";
if ($mmn == "05") $mm1n="мая";
if ($mmn == "06") $mm1n="июня";
if ($mmn == "07") $mm1n="июля";
if ($mmn == "08") $mm1n="августа";
if ($mmn == "09") $mm1n="сентября";
if ($mmn == "10") $mm1n="октября";
if ($mmn == "11") $mm1n="ноября";
if ($mmn == "12") $mm1n="декабря";

if ($ddn == "01") $ddn="1";
if ($ddn == "02") $ddn="2";
if ($ddn == "03") $ddn="3";
if ($ddn == "04") $ddn="4";
if ($ddn == "05") $ddn="5";
if ($ddn == "06") $ddn="6";
if ($ddn == "07") $ddn="7";
if ($ddn == "08") $ddn="8";
if ($ddn == "09") $ddn="9";

$hours = substr($dtn,11,5); // Время 

$ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' г. '.$hours.'</span>'; // Конечный вид строки


   
	$patterns = array ('/(?:www.)?barysh-eparhia\.ru/', '/(http:\/\/[^\s\[<\(\)]+)/i', '/(?:\/{3})(([0-9]*[^\/{3}]*)*)(?:\/{3})/', '/(?:\|{3})(([0-9]*[^\|{3}]*)*)(?:\|{3})/', '/\n/', '/(?:\{{3})(\d?\s?[а-яА-Я]{2,4})\.\s(\d{1,2})\:((\d{1,2})(?:[-*,*\s*.*-*–*]+\d{1,2})+)(?:\}{3})/', '/(?:\{{3})(\d?\s?[а-яА-Я]{2,4})\.\s(\d{1,2})\:(\d{1,2})(?:\}{3})/', '/(?:\[{3})(([0-9]*[^\]{3}]*)*)(?:\]{3})/');
	$replace = array ('pda.barysh-eparhia.ru', '<a href="${1}" target=_blank>${1}</a>', '<i>${1}</i>', '<b>${1}</b>', '</p><p>', '<a href="http://www.ekzeget.ru/glava.php?kn_rus=${1}&gl=${2}&marker_st=${3}#${4}" target="_blank">${1}. ${2}:${3}</a>', '<a href="http://www.ekzeget.ru/stih.php?kn_rus=${1}&gl=${2}&st=${3}"  target="_blank">${1}. ${2}:${3}${4}</a>', '<div style="text-align: center; font-weight: bolder;Width:100%; color:#743C00">${1}</div>');
	$text = preg_replace($patterns, $replace, $news[text]);
 
 	echo '<div class="block_title"><span class="title">'.$news[tema].'</span><br />'.$ddttn.'</div><br />';

if ($news[img]) echo '<span class="photos"><img style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3); display: inline;float: left;border: 1px solid #C3D7D4; margin: 0 10px 5px 10px; padding: 10px" src="http://barysh-eparhia.ru/IMG/'.$news[img].'.jpg" /></span>';

echo '<p>'.$text.'</p>';

echo '<span class="views">Просмотров: '.$views.'.</span>';
include 'footer.php';
?>

</body>
</html>