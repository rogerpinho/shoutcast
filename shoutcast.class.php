<?php
//By : Roger Vezaro
Class Shoutcast {

    private $ip;

    private $port;

    public function __construct($ip ,$port) {
    	$this->ip = $ip;
    	$this->port = $port;
    	$this->data();
    }

	public function data(){
		$data = explode("-", $this->open());
		$this->artist = $data[0];
		$this->music = $data[1];
	}

	public function open() {
		$open = fsockopen("$this->ip", "$this->port");
		fputs($open, "GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n");
		$read = fread($open, 1000);
		$text = explode("content-type:text/html" , $read);
		$text = explode("," , $text[1]);
		if ($text[1]==1):
			$this->state = "Online";
		else:
			$this->state = "Offline";  
        endif;
		return $text[6];
	}

	public function getArtist(){
		return $this->artist;
	}

	public function getMusic(){
		return $this->music;
	}

	public function getState(){
		return $this->state;
	}
} 
?>