<?php
/*
*@author  starry
*@time    2012-05-01
*@description :  the encrypt and decrypt functions used for string
*@params:   $plain_text the string before encryption.     
            $c_t   the string after encryption
            $key   the key used by encrypt and decrypt
*/



  function encrypt($key, $plain_text) {
      $plain_text = trim($plain_text);
      $iv = substr(md5($key), 0,mcrypt_get_iv_size (MCRYPT_CAST_256,MCRYPT_MODE_CFB));
      $c_t = mcrypt_cfb (MCRYPT_CAST_256, $key, $plain_text, MCRYPT_ENCRYPT, $iv);
      return trim(chop(base64_encode($c_t)));
  }


  function decrypt($key, $c_t) {
      $c_t =trim(chop(base64_decode($c_t)));
      $iv = substr(md5($key), 0,mcrypt_get_iv_size (MCRYPT_CAST_256,MCRYPT_MODE_CFB));
      $p_t = mcrypt_cfb (MCRYPT_CAST_256, $key, $c_t, MCRYPT_DECRYPT, $iv);
      return trim(chop($p_t));
  }

  $encryted_str=encrypt("zsw","441481199010193000");
  echo "<br>加密后的字符串为:$encryted_str<br><br><br><br><br>";
  $decrypt_str=decrypt("zsw",$encryted_str);
  echo "解密后的字符串为:$decrypt_str<br>";
?>
