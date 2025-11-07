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
<title>Барышская епархия</title>

</head>
<body>

<?
include 'golova.php';

include 'menu.php';

 mysql_connect("localhost", "host1409556", "0f7cd928"); 
 mysql_query("SET NAMES 'cp1251'");
	$news_all = mysql_query("SELECT * FROM host1409556_barysh.news_day");

	$news = mysql_fetch_array($news_all); 

$dt_n = $news[data]; 
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

	$patterns = array ('/(?:\{{3})(http:\/\/[^\s\[<\(\)\|]+)(?:\}{3})-(?:\{{3})([^}]+)(?:\}{3})/i', '/\n/', '/(?:\/{3})/', '/(?:\|{3})/', '/@[^@]+@/', '/(?:\{{3})/', '/(?:\}{3})/');
	$replace = array ('${2}', '</p><p>', '', '', '', '', '');

	$text = preg_replace($patterns, $replace, $news[text]);
	   

echo '<div style="float: left;  padding-top: 5px; margin-bottom: 5px; background:#FFFDC4">';

if ($news[oblozka]) echo '<a href="'.$news[page].'_show.php?data='.$news[data].'"><img style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3); display: inline;float: left;border: 1px solid #C3D7D4; margin: 0 10px 5px 10px; padding: 10px " src="http://barysh-eparhia.ru/DAY/'.$news[oblozka].'.jpg" /></a>';

echo '<div style="margin-left: 5px;"><span class="title"><a href="'.$news[page].'_show.php?data='.$news[data].'">'.$news[tema].'</a></span><br />'.$ddttn.'</div><br /><p>'.$text.'</p>';

$page_news_day = $news[page];
?>
</div>
<br />

<?
    mysql_connect("localhost", "host1409556", "0f7cd928"); 
	 $data_today = Date("Y.m.d");
		$news_all_r = mysql_query("SELECT * FROM host1409556_barysh.raspisanie where data between '$data_today' and '9999.12.31' ORDER BY data ASC LIMIT 1");

$news_r = mysql_fetch_array($news_all_r); 
if ($news_r[text]) echo '<h2 style="color: #7A6D42; border-bottom: 5px solid #E6E0C6;">Архиерейское служение</h2><br />';

	$news_all = mysql_query("SELECT * FROM host1409556_barysh.raspisanie where data between '$data_today' and '9999.12.31' ORDER BY data ASC LIMIT 3");
	for ($t=0; $t<mysql_num_rows($news_all); $t++)
{
$news = mysql_fetch_array($news_all); 
echo '

<p><b>'.$news[data_text].' - '.$news[nedel].'</b></p>';
	$patterns = array ('/\n/', '/(\d{1,2}:\d{2})/');
	$replace = array ('</p><p>', '<b>${1}</b>');
	$text = preg_replace($patterns, $replace, $news[text]);

echo '<p>'.$text.'</p>
';
}


?>

<h2>Новости епархии</h2>
<br />

 <?   mysql_connect("localhost", "host1409556", "0f7cd928"); 
 	$news_all = mysql_query("SELECT * FROM host1409556_barysh.news_eparhia WHERE data != '$dt_n' ORDER BY data DESC LIMIT 2");
	for ($t=0; $t<mysql_num_rows($news_all); $t++)
{
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
	$patterns = array ('/(?:\{{3})(http:\/\/[^\s\[<\(\)\|]+)(?:\}{3})-(?:\{{3})([^}]+)(?:\}{3})/i', '/\n/', '/(?:\/{3})/', '/(?:\|{3})/', '/@[^@]+@/', '/(?:\{{3})/', '/(?:\}{3})/');
	$replace = array ('${2}', '</p><p>', '', '', '', '', '');

	$text = preg_replace($patterns, $replace, $news[kratko]);

echo '<div style="margin-left: 5px;"><span class="title"><a href="news_show.php?data='.$news[data].'">'.$news[tema].'</a></span><br />'.$ddttn.'</div><br /><div style="margin-bottom: 5px">';

echo '<p>'.$text.'<br /><br /></p></div>';
}
?>

<h2>Анонсы</h2>
<br />

 <?   mysql_connect("localhost", "host1409556", "0f7cd928"); 
	$news_all = mysql_query("SELECT * FROM host1409556_barysh.anons WHERE data != '$dt_n' ORDER BY data DESC LIMIT 2");
	for ($t=0; $t<mysql_num_rows($news_all); $t++)
{
$news = mysql_fetch_array($news_all); 

$dtn = $news[data]; 
$yyn = substr($dtn,0,4); // Год
$mmn = substr($dtn,5,2); // Месяц
$ddn = substr($dtn,8,2); // День

// Переназначаем переменные
if ($mmn == "01") $mm1n="янв.";
if ($mmn == "02") $mm1n="фев.";
if ($mmn == "03") $mm1n="мар.";
if ($mmn == "04") $mm1n="апр.";
if ($mmn == "05") $mm1n="мая";
if ($mmn == "06") $mm1n="июн.";
if ($mmn == "07") $mm1n="июл.";
if ($mmn == "08") $mm1n="авг.";
if ($mmn == "09") $mm1n="сен.";
if ($mmn == "10") $mm1n="окт.";
if ($mmn == "11") $mm1n="нояб.";
if ($mmn == "12") $mm1n="дек.";

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

	$patterns = array ('/\n/');
	$replace = array ('</p><p>');
	$text = preg_replace($patterns, $replace, $news[kratko]);

echo '<p style="background:#FFFDC4"><b>'.$news[when].'</b></p>';
echo '<div  style="margin-left: 10px"><a href="anons_show.php?data='.$news[data].'">'.$news[tema].'</a></div><br />';

echo '<p>'.$text.'</p>';
}
?>

<br />

<h2>Документы</h2>
<br />

 <?   mysql_connect("localhost", "host1409556", "0f7cd928"); 
 
 $news_all = mysql_query("SELECT * FROM host1409556_barysh.doks ORDER BY date DESC LIMIT 3");

 for ($t=0; $t<mysql_num_rows($news_all); $t++)
{
$news = mysql_fetch_array($news_all); 

$dtn = $news[date]; 
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


$ddttn = $ddn.' '.$mm1n.' '.$yyn.' г.'; // Конечный вид строки

	$patterns = array ('/(?:\{{3})(http:\/\/[^\s\[<\(\)\|]+)(?:\}{3})-(?:\{{3})([^}]+)(?:\}{3})/i', '/\n/', '/\{/', '/\}/');
	$replace = array ('${2}', '</p><p>', '', '');

	$text = preg_replace($patterns, $replace, $news[text]);

echo '<div style="margin-left: 5px;"><span class="title">';
if ($news[tematika] == 'ukaz') echo 'Указ';
if ($news[tematika] == 'raspor') echo 'Распоряжение';
if ($news[tematika] == 'cirk') echo 'Циркуляр';
if ($news[tematika] == 'udostoverenie') echo 'Удостоверение о рукоположении в сан '.$news[name];
echo ' № '.$news[nomer].' от '.$ddttn.'</span><br />';
if ($news[tematika] != 'udostoverenie') echo '<div style="padding-left: 25%; float:right; text-align: right; margin-top: 5px; margin-bottom: 5px"><i>'.$news[name].'</i></div><br />';
echo '</div><div style="margin-top: 5px; margin-bottom: 5px">';

if (preg_match_all ("/^[^\t]{350}/", $news[text], $massiv_news)) {
	 	$patterns = array ('/(?:\{{3})(http:\/\/[^\s\[<\(\)\|]+)(?:\}{3})-(?:\{{3})([^}]+)(?:\}{3})/i', '/\{/', '/\}/');
	$replace = array ('${2}', '', '');

	$text = preg_replace($patterns, $replace, $massiv_news[0][0]);
  $text = $text.'... <a href="doks_show.php?tip='.$news[tematika].'&data='.$news[date].'">(читать далее)</a>';
  	$text = preg_replace('/\n/', '</p><p>', $text);

  }

echo '<p>'.$text.'<br /><br /></p></div>';
}
?>

<h2>Публикации</h2>
<br />

 <?    	$pub_all = mysql_query("SELECT * FROM host1409556_barysh.publikacii WHERE data != '$dt_n' ORDER BY data DESC LIMIT 2");

	for ($t=0; $t<mysql_num_rows($pub_all); $t++)
{
$news = mysql_fetch_array($pub_all); 

$dtn = $news[data]; 
$yyn = substr($dtn,0,4); // Год
$mmn = substr($dtn,5,2); // Месяц
$ddn = substr($dtn,8,2); // День

// Переназначаем переменные
if ($mmn == "01") $mm1n="янв.";
if ($mmn == "02") $mm1n="фев.";
if ($mmn == "03") $mm1n="мар.";
if ($mmn == "04") $mm1n="апр.";
if ($mmn == "05") $mm1n="мая";
if ($mmn == "06") $mm1n="июн.";
if ($mmn == "07") $mm1n="июл.";
if ($mmn == "08") $mm1n="авг.";
if ($mmn == "09") $mm1n="сен.";
if ($mmn == "10") $mm1n="окт.";
if ($mmn == "11") $mm1n="нояб.";
if ($mmn == "12") $mm1n="дек.";

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

	$patterns = array ('/\n/');
	$replace = array ('</p><p>');
	$text = preg_replace($patterns, $replace, $news[kratko]);

echo '<p><b>'.$news[when].'</b></p>';
echo '<div style="margin-left: 5px;"><span class="title"><a href="pub_show.php?data='.$news[data].'">'.$news[tema].'</a></span><br />'.$ddttn.'</div><br /><div style="margin-bottom: 5px">';

echo '<p>'.$text.'<br /><br /></p></div>';
}


include 'footer.php';
?>

</body>
</html>