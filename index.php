<?php 
include('config.php'); 
$config = new config();
@$data= $_REQUEST['code'];
if(!empty($data)){
$url = $config->paste($data , $_SERVER['REMOTE_ADDR']);
print  "link: http://".$_SERVER["SERVER_NAME"].$_SERVER['PHP_SELF']."?view_id=".$url."";

}
if(isset($_GET['view_id'])){
$view= (int) $_GET['view_id'];
$row = $config->view($view);
echo 'Date posted: <b>',$row['date'],'</b><br/>'.'<div id=\'code\'><code>'.$row['paste'].'</code></div>';
}?>
