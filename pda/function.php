<?
function GetNav($p, $num_pages, $url){
 
//Проверяем нужна ли ссылка "На первую"
  if($p > 4){
    $first_page = '<a href="/'.$url.'.php?page=1">1...</a> ';   //или просто $first_page = '<a href="/'.$url.'.php"><<</a>';
  }
  elseif ($p > 3){
    $first_page = '<a href="/'.$url.'.php?page=1">1</a> ';   //или просто $first_page = '<a href="/'.$url.'.php"><<</a>';
  }
  else{
    $first_page = '';
  }
 
//Проверяем нужна ли ссылка "На последнюю"
  if($p < ($num_pages - 3)){
    $last_page = ' <a href="/'.$url.'.php?page='.$num_pages.'">...'.$num_pages.'</a> ';
  } elseif($p < ($num_pages - 2)){
    $last_page = ' <a href="/'.$url.'.php?page='.$num_pages.'">'.$num_pages.'</a> ';
  }
  else{
    $last_page = '';
  }
 
//Проверяем нужна ли ссылка "На предыдущую"
  if($p > 1){
    $prev_page = ' <a href="/'.$url.'.php?page='.($p - 1).'">Предыдущая</a> | ';
  }
  else{
    $prev_page = '<span style="color:#009999">Предыдущая </span>| ';
  }
 
//Проверяем нужна ли ссылка "На следущую"
  if($p < $num_pages){
    $next_page = ' | <a href="/'.$url.'.php?page='.($p + 1).'">Следующая</a>';
  }
  else{
    $next_page = ' | <span style="color:#009999">Следующая</span>';
  }
 
//Формируем по 2 страницы до и после текущей (при наличии таковых, конечно):
  if($p - 2 > 0){
    $prev_2_page = ' <a href="/'.$url.'.php?page='.($p - 2).'">'.($p - 2).'</a> ';
  }
  else{
    $prev_2_page = '';
  }
  if($p - 1 > 0){
    $prev_1_page = ' <a href="/'.$url.'.php?page='.($p - 1).'">'.($p - 1).'</a> ';
  }
  else{
    $prev_1_page = '';
  }
  if($p + 2 <= $num_pages){
    $next_2_page = ' <a href="/'.$url.'.php?page='.($p + 2).'">'.($p + 2).'</a> ';
  }
  else{
    $next_2_page = '';
  }
  if($p + 1 <= $num_pages){
    $next_1_page = ' <a href="/'.$url.'.php?page='.($p + 1).'">'.($p + 1).'</a> ';
  }
  else{
    $next_1_page = '';
  }
  $nav = '<div style="text-align:center;width:100%;"><span class=ssilki_v_texte>'.$prev_page.$first_page.$prev_2_page.$prev_1_page.'<b>'.$p.'</b>'.$next_1_page.$next_2_page.$last_page.$next_page.'</span></div>';
 if ($num_pages > 1) return $nav;
}
function GetNavtip($p, $num_pages, $url, $tip){
 
//Проверяем нужна ли ссылка "На первую"
  if($p > 4){
    $first_page = '<a href="/'.$url.'.php?page=1&tip='.$tip.'">1...</a> ';   //или просто $first_page = '<a href="/'.$url.'.php"><<</a>';
  }
  elseif ($p > 3){
    $first_page = '<a href="/'.$url.'.php?page=1&tip='.$tip.'">1</a> ';   //или просто $first_page = '<a href="/'.$url.'.php"><<</a>';
  }
  else{
    $first_page = '';
  }
 
//Проверяем нужна ли ссылка "На последнюю"
  if($p < ($num_pages - 3)){
    $last_page = ' <a href="/'.$url.'.php?page='.$num_pages.'&tip='.$tip.'">...'.$num_pages.'</a> ';
  } elseif($p < ($num_pages - 2)){
    $last_page = ' <a href="/'.$url.'.php?page='.$num_pages.'&tip='.$tip.'">'.$num_pages.'</a> ';
  }
  else{
    $last_page = '';
  }
 
//Проверяем нужна ли ссылка "На предыдущую"
  if($p > 1){
    $prev_page = ' <a href="/'.$url.'.php?page='.($p - 1).'&tip='.$tip.'">Предыдущая</a> | ';
  }
  else{
    $prev_page = '<span style="color:#009999">Предыдущая </span>| ';
  }
 
//Проверяем нужна ли ссылка "На следущую"
  if($p < $num_pages){
    $next_page = ' | <a href="/'.$url.'.php?page='.($p + 1).'&tip='.$tip.'">Следующая</a>';
  }
  else{
    $next_page = ' | <span style="color:#009999">Следующая</span>';
  }
 
//Формируем по 2 страницы до и после текущей (при наличии таковых, конечно):
  if($p - 2 > 0){
    $prev_2_page = ' <a href="/'.$url.'.php?page='.($p - 2).'&tip='.$tip.'">'.($p - 2).'</a> ';
  }
  else{
    $prev_2_page = '';
  }
  if($p - 1 > 0){
    $prev_1_page = ' <a href="/'.$url.'.php?page='.($p - 1).'&tip='.$tip.'">'.($p - 1).'</a> ';
  }
  else{
    $prev_1_page = '';
  }
  if($p + 2 <= $num_pages){
    $next_2_page = ' <a href="/'.$url.'.php?page='.($p + 2).'&tip='.$tip.'">'.($p + 2).'</a> ';
  }
  else{
    $next_2_page = '';
  }
  if($p + 1 <= $num_pages){
    $next_1_page = ' <a href="/'.$url.'.php?page='.($p + 1).'&tip='.$tip.'">'.($p + 1).'</a> ';
  }
  else{
    $next_1_page = '';
  }
  $nav = '<div style="text-align:center;width:100%;"><span class=ssilki_v_texte>'.$prev_page.$first_page.$prev_2_page.$prev_1_page.'<b>'.$p.'</b>'.$next_1_page.$next_2_page.$last_page.$next_page.'</span></div>';
 if ($num_pages > 1) return $nav;
}

?>