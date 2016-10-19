<?php

function ck_gp($gp,$field='',$exc=''){
		if(is_array($gp)){
			foreach($gp as $key => $value){
				if($key==$field) continue;
				$gp[$key]=ck_gp($value,'',$exc);
			}
			return $gp;
		}else{
			$gp = trim($gp);
   			$gp = (get_magic_quotes_gpc()) ? $gp : addslashes($gp); 
			$gp = strip_tags($gp);		
			return $gp;
		}
}
function m_esc($ot){
		if(is_array($ot)){
			foreach($ot as $key => $value){
				$ot[$key]=m_esc($value);
			}
			return $ot;
		}else{
			$ot=ds($ot);
			$ot=mysql_real_escape_string($ot); 
			return $ot;
		}
}
function check_gp($gp){
   $gp = trim($gp);
   $gp = (get_magic_quotes_gpc()) ? $gp : addslashes($gp); 
   $gp = strip_tags($gp);
   return $gp;
}

function check_gp_br($gp){
   $gp = trim($gp);
   $gp = (get_magic_quotes_gpc()) ? $gp : addslashes($gp); 
   $gp = strip_tags($gp,'<br><br/>');
   return $gp;
}
function ck_num($ot){
	if(preg_match("/^([0-9]{1,})$/",$ot)){
		return true;
	}else{
		return false;
	}
}
function ht($ot){
		if(is_array($ot)){
			foreach($ot as $key => $value){
				$ot[$key]=htmlspecialchars($value,ENT_QUOTES);
			}
			return $ot;
		}else{
			return htmlspecialchars($ot,ENT_QUOTES);
		}
}
function jt($ot){
		if(is_array($ot)){
			foreach($ot as $key => $value){
				$ot[$key]=addslashes(htmlspecialchars($value));
			}
			return $ot;
		}else{
			return addslashes(htmlspecialchars($ot));
		}
}
function ds($ot){
		if(is_array($ot)){
			foreach($ot as $key => $value){
				$ot[$key]=stripslashes($value);
			}
			return $ot;
		}else{
			return stripslashes($ot);
		}
}
function al($ot){
		if(is_array($ot)){
			foreach($ot as $key => $value){
				$ot[$key]=addslashes($value);
			}
			return $ot;
		}else{
			return addslashes($ot);
		}
}
function gt($ot){
		if(is_array($ot)){
			foreach($ot as $key => $value){
				$ot[$key]=htmlspecialchars(ds($value));
			}
			return $ot;
		}else{
			return htmlspecialchars(ds($ot));
		}
}
?>