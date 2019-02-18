<?php
/**
 * Created by PhpStorm.
 * User: Winter
 * Date: 2018/9/29
 * Time: 14:58
 */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$file = $_FILES['id_card'];
$fileInfo = pathinfo($_FILES['id_card']['name']);
$filename = $fileInfo['filename']."_".time().rand(1000,9999).$fileInfo['dirname'].$fileInfo['extension'];
$filepath = '../tmp/'.$filename;
move_uploaded_file($file['tmp_name'],$filepath);
$content = file_get_contents($filepath);
$imgUrl = "http://www.winter.me/tmp/".$filename;
$response = [
    'status' => 0,
    'message'=> 'success',
    'data'   => $imgUrl,
];
echo json_encode($response,320);