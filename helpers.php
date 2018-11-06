<?php

function sanitize($dirty){
	return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}
 function money($number){
 	return number_format($number,2).' RON';
 }