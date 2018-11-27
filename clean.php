<?php
error_reporting(0);
function sanitize($data){

$data=stripslashes($data);

$data=strip_tags($data);

$data=htmlspecialchars($data, ENT_QUOTES, 'UTF-8');

$data=trim($data);

$data=nl2br($data);

return $data;
}
?>
