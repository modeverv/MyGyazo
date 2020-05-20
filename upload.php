<?php
$id=$_REQUEST["id"];
$imagedata = file_get_contents($_FILES['imagedata']['tmp_name']);
$filename = "data/" . md5($imagedata) . ".png";
file_put_contents ($filename, $imagedata);
echo "https://gyazo.lovesaemi.daemon.asia/" . $filename; 

