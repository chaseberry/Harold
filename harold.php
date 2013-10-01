<?php

$file_types = array(
	"mp3"=>"Content-Type:audio/mpeg",
	"mp4"=>"Content-Type:audio/mp4",
	"wav"=>"Content-Type:audio/vnd.wave"
);

$files = array_merge(getMusic("./Harold/"),getMusic("./harold/"));	//make the array from the two folders

for($z = 0; $z < count($files); $z++){
	$temp = getFileType($files[$z]);					//gets the extension
	if($temp != "mp3" && $temp != "wav" && $temp != "mp4" ){						//check for mp3
		unset($files[$z]);						//removes all non-mp3 files from array
	}	
}	

$music = $files[array_rand($files,1)];					//sets the music file to play from Harold
if(file_exists($music)){							//the music file exists
	header($file_types[getFileType($music)]);				//set header type
	readfile($music);							//play it
}

function getMusic($file){
	if(file_exists($file)){//checks to see if the folder exists
		$arr = array_diff(scandir($file), array('..','.'));	//makes the array
		return addDir(array_merge($arr),$file);			//returns the array;
	}
	return array();							//returns a blank array so the system doesn't go BLEH if no file is found
}

function addDir($arr, $file){
	for($z=0;$z<count($arr);$z++){					
		$arr[$z] = $file . $arr[$z];				//adds the correct directory for each file
	}
	return $arr;
}

function getFileType($file){
	$file = explode(".",$file);
	return strtolower($file[count($file)-1]);
}

?>
