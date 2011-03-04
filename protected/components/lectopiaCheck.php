<?php

class lectopiaCheck{

	public $url = 'http://lectopia.recordings.uq.edu.au/lectopia/lectopia.lasso?ut=';
	public $agent = "Mozilla/5.0 WindowsUWindows NT 6.1en-USAppleWebKit/534.13KHTML, like GeckoChrome/9.0.597.98 Safari/534.13";
	private $_result;
	
	public function checkURL($id){

		$url = $this->url.$id;
		
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, $url);     
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->agent);

		ob_start();      
		$result = curl_exec ($ch); 
		ob_end_clean();  
		curl_close ($ch); 
		unset($ch);
		
		$this->_result = $result;
	}
	
	public function extractdata(){
		$class = New lectureData;
		$regex = '/<h2 style="color: #FFFFFF;">(.*?)<\/h2>/';
		preg_match($regex, $this->_result, $matches);
		if(isset($matches[1])){

			$class->description = $matches[1];
			
			$regex = '*[a-zA-Z][a-zA-Z][a-zA-Z][a-zA-Z][0-9][0-9][0-9][0-9]*';
			
			preg_match($regex, $class->description, $matches);
			
			if(isset($matches[0])){
				$class->code = $matches[0];
			}else{
				$class->code = Null;
			}
		
			$regex = '/<\/strong> of <strong>(.*?)<\/strong>/';
			preg_match($regex, $this->_result, $matches);
			if(isset($matches[1])){
				$class->count =  $matches[1];
			}
		}
		
		return $class;
	}

}

class lectureData{
	public $code;
	public $count;
	public $description;
	
	public function attributes(){
		return array(
		'code' => $this->code,
		'count' => $this->count,
		'description' => $this->description
		);
	}
}