<?php
$files = array_diff(scandir("./Harold/"), array('..','.'));
$music = "./Harold/" . $files[array_rand($files,1)];
if(file_exists($music)){

header("Content-Type:audio/x-mp3");
readfile($music);
}

?>
