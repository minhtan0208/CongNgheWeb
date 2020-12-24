<?php 
  
  function name_code($str)
  {
  		$ext = strtolower(pathinfo($str, PATHINFO_EXTENSION));
  		$new_name = time() .".". $ext;
  		return $new_name;
	}

	function generateURL($str) {
       $charMap = array(
         // In thường
         "a" => "á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ",
         "d" => "đ",
         "e" => "é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ",
         "i" => "í|ì|ỉ|ĩ|ị",
         "o" => "ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ",
         "u" => "ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự",
         "y" => "ý|ỳ|ỷ|ỹ|ỵ",
         // In hoa
         "A" => "Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ",
         "D" => "Đ",
         "E" => "É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ",
         "I" => "Í|Ì|Ỉ|Ĩ|Ị",
         "O" => "Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ",
         "U" => "Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự",
         "Y" => "Ý|Ỳ|Ỷ|Ỹ|Ỵ",
         "" => ",",
      );

      foreach($charMap as $replace => $search){
        $str = preg_replace("/($search)/i", $replace, $str);
      }
      return str_replace(" ", "-", $str);
  }

?>