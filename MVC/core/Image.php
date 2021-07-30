<?php
class Image
{
    public static function uploadImage($formname,$query,$params)
    {
        $image = base64_encode(file_get_contents($_FILES[$formname]['tmp_name'])); // change file to text . using base64 . usually used for image upload on web
        $options = array('http' => array(
            'method' => "POST",
            'header' => "Authorization: Bearer cd2da4cb14de0b01f1a299999604c10bd207c81d\n" .
                "Content-Type: application/x-www-form-urlencoded",
            'content' => $image,
            'ignore_errors' => true
        ));
        $context = stream_context_create($options);

        $imgurURL = "https://api.imgur.com/3/image";

        if ($_FILES[$formname]['size'] > 10240000) {
            die('Image too big , must be 100MB or less!'); //
        }
        $response = file_get_contents($imgurURL, false, $context);
        $response = json_decode($response);

        $preparams = array($formname=>$response->data->link); 
        $params = $preparams + $params;
        DB::query($query,$params);
    }
}
