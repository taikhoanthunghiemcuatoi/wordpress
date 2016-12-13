<?php

	$dms_params = array();

	function dms_split_string($string, $delimiter){
		$array = explode($delimiter, $string);
		return $array;
	}
		
	function dms_load_properties($filename){		
		$file = fopen($filename, "r") or die("cannot open file " + $filename);
		while (!feof($file)) {			
			$delimiter = '=';
			$string = fgets($file);
			$array = dms_split_string($string, $delimiter);
			$param = trim($array[0]);
			$value = trim($array[1]);
			$GLOBALS['dms_params'][$param] = $value;
		}
//		echo "loaded the params from the file " . $filename . "<br>";
//		print_r($GLOBALS['dms_params']);
		fclose($file);
	}
	
	function dms_parse_csv($filename){
		$file = fopen($filename, "r") or die("cannot open file " + $filename);
		$index = 0;
		$array = array();
		while(!feof($file)){
			$delimiter = ',';
			$string = fgets($file);
			$array[$index] = dms_split_string($string, $delimiter);
			$index++;
			
		}
		fclose($file);
		return $array;
	}

?>