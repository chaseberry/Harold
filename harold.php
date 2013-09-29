<?php
$file = scandir("./Harold/");
unset($file[0]);
unset($file[1]);
$music = "./Harold/" . $file[array_rand($file,1)];
if(file_exists($music)){

header("Content-Type:audio/x-mp3");
readfile($music);
}

?>
