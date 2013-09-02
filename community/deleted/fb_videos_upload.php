<?php
$app_id = "110061579084393";
$app_secret = "49d12e5c8efd9f5bdc4f49db75348a3f";
$my_url = "http://localhost:8888/v12.8/community/fb_videos_upload.php";
$video_title = "TITLE FOR THE VIDEO";
$video_desc = "DESCRIPTION FOR THE VIDEO";
$group_id = "458164160907688";

$code = $_REQUEST["code"];

echo '<html><body>';

if(empty($code)) {
   $dialog_url = "http://www.facebook.com/dialog/oauth?client_id="
     . $app_id . "&redirect_uri=" . urlencode($my_url)
     . "&scope=publish_stream";
    echo('<script>top.location.href="' . $dialog_url . '";</script>');
}

$token_url = "https://graph.facebook.com/oauth/access_token?client_id="
    . $app_id . "&redirect_uri=" . urlencode($my_url)
    . "&client_secret=" . $app_secret
    . "&code=" . $code;
$access_token = file_get_contents($token_url);

$post_url = "https://graph-video.facebook.com/" . $group_id . "/videos?"
    . "title=" . $video_title. "&description=" . $video_desc
    . "&". $access_token;

echo '<form enctype="multipart/form-data" action=" '.$post_url.' "  
     method="POST">';
echo 'Please choose a file:';
echo '<input name="file" type="file">';
echo '<input type="submit" value="Upload" />';
echo '</form>';

echo '</body></html>';
?>