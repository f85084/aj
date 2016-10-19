<?php
function authcode ($string, $operation='ENCODE', $key = '') {

$key = md5($key ? $key : $GLOBALS['auth_key']);
	$key_length = strlen($key);

	$string = $operation == 'DECODE' ? base64_decode($string) : substr(md5($string.$key), 0, 8).$string;
	$string_length = strlen($string);

	$rndkey = $box = array();
	$result = '';

	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($key[$i % $key_length]);
		$box[$i] = $i;
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if(substr($result, 0, 8) == substr(md5(substr($result, 8).$key), 0, 8)) {
			return substr($result, 8);
		} else {
			return '';
		}
	} else {
		return str_replace('=', '', base64_encode($result));
	}

}
function cutstr($string, $length, $dot = ' ...') {
	$charset='utf-8';

	if(strlen($string) <= $length) {
		return $string;
	}

	$strcut = '';
	if(strtolower($charset) == 'utf-8') {

		$n = $tn = $noc = 0;
		while ($n < strlen($string)) {

			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t <= 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}

			if ($noc >= $length) {
				break;
			}

		}
		if($n == strlen($string)){ $dot='';}
		if ($noc > $length) {
			$n -= $tn;
		}
		
		$strcut = substr($string, 0, $n);

	} else {
		for($i = 0; $i < $length - strlen($dot) - 1; $i++) {
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}

	return $strcut.$dot;
}

function report($logmsg,$floder){     
    $file_name =	gmdate('Ymd',time()+8*3600).".txt";
    $path_name  = $floder;
    $filepath = $path_name.$file_name ;
  if(is_file($filepath)){  
    if($fd = fopen($filepath, "a+")){ //開檔
	flock($fd, LOCK_EX); //3 20111014
    fwrite($fd, $logmsg); //寫入
	flock($fd, LOCK_UN);   // release the lock
    fclose($fd); //關檔完成
	unset($fd); 
    }
  }else{
    file_put_contents($filepath,$logmsg);
  }
}

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
function makedir($folder) {
		$dir = @ explode("/", $folder);
		$num = @ count($dir) - 1;
		$tmp = './';
		//$tmp = '/';//lannet110303
		for ($i = 0; $i < $num; $i++) {
		  if($dir[$i]!=''){//lannet
			$tmp .= $dir[$i];
			if (!file_exists($tmp)) {
				@ mkdir($tmp);
				@ chmod($tmp, 0777);
			}
			$tmp .= '/';
		  }//lannet
		}
	}

//清除目錄內的所有檔案&資料夾
	function CleanDir($dir){	 
     $handle=opendir($dir);
	 while ( $file=readdir($handle) )
	 {
		if ( ($file==".") || ($file=="..") ) continue;
		if ( is_dir("$dir/$file") )
		{
			CleanDir("$dir/$file");
			rmdir("$dir/$file");	//echo "Remove dir \"$dir/$file\" successfully!<br>";
                       // else				//echo "<FONT COLOR=RED>Fail to Remove dir \"$dir/$file\"!</FONT><br>"; 
		} 
		else      
		{ 
			if(is_file("$dir/$file")) unlink("$dir/$file");    //echo "Del file \"$dir/$file\" successfully!<br>"; 
			//else                 		//echo "<FONT COLOR=RED>Fail to del file \"$dir/$file\"!</FONT><br>";  
		}
	 }
	 closedir($handle);
	}
 
function merArr($o,$t,$esc=array()){
		$des='';
		foreach($o as $k => $v){
			if(!in_array($k,$esc)){
				if($v != $t[$k]){$des.=" $k ori => ".$v.' new => '.$t[$k];}				
			}			
		}		
		return $des;
	}

function n_format($x){
		$return='';
		if($x!=''){
			$xn=explode('.',$x);
			$lens=strlen($xn[0]);
			$y=1;
			for($i=$lens;$i>0;$i--){
				$return=$xn[0][$i-1].$return;
				if($y%3==0 && $i > 1){
					$return=','.$return;
				}
				++$y;
			}
			if($xn[1] != ''){
				$return=$return.'.'.$xn[1];
			}
		}
		return $return;
	}


//檢查目錄內的所有檔案&資料夾有無php檔
	function CheckDir($dir){	 
     $handle=opendir($dir);
	 while ( $file=readdir($handle) )
	 {
		if ( ($file==".") || ($file=="..") ) continue;
		if ( is_dir("$dir/$file") )
		{
			CheckDir("$dir/$file");			
		} 
		else      
		{ 
			if(strpos("$dir/$file",'.php') || strpos("$dir/$file",'.PHP')) unlink("$dir/$file");    //del php file
		}
	 }
	 closedir($handle);
	}

function re0($x){
	if(strlen($x)==1){ return '0'.$x;}else{return $x;}
}
function get_ad($tarray,$type=1,$num,$ckN,$round=0){
global $cookiedomain,$cookiepath,$expire;
	$adArray=array();
	$n=count($tarray);
	switch($type){
		case 1:
				if(!isset($_COOKIE[$ckN]) || $_COOKIE[$ckN] > $n || $_COOKIE[$ckN] < 0){
					$ck=rand(0,$n-1);
					//setcookie($ckN,$ck,$expire,$cookiepath,$cookiedomain);// when browser close gone	
				}else{
					$ck=$_COOKIE[$ckN]+1;
				}
				for($i=0;$i<$num;$i++){
					$rn=($ck+$i)%$n;					
					$adArray[$i]=$tarray[$rn];
				}
				setcookie($ckN,$rn,$expire,$cookiepath,$cookiedomain);
		break;
		case 2:
				if(!isset($_COOKIE[$ckN]) || $_COOKIE[$ckN] > $n || $_COOKIE[$ckN] < 0){
					$ck=rand(0,$n-1);
					//setcookie($ckN,$ck,$expire,$cookiepath,$cookiedomain);// when browser close gone	
				}else{
					$ck=$_COOKIE[$ckN]+1+$round;
				}
				for($i=0;$i<$num;$i++){
					$rn=($ck+$i)%$n;					
					$adArray[$i]=$tarray[$rn];
				}
				setcookie($ckN,$rn,$expire,$cookiepath,$cookiedomain);
		
		break;
		default:
		break;				
	}
	return $adArray;
}
function reBlk($t=0,$url=''){
	$re='';
	if($t==0 && $url!=''){$re='';}elseif($t==1 && $url!=''){$re=' target="_blank"';}
	return $re;	
}
?>