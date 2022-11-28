<?php

// in save_process.php

$imagedata = base64_decode($_REQUEST['imgSrc']);
$file_name = "capture_".date("YmdHis").".png";

$file = $_SERVER['DOCUMENT_ROOT'] . "/data/" . $file_name;
file_put_contents($file, $imagedata);

echo "SUCCESS";

?>