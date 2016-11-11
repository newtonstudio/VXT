<?php
class Session {

    public function __construct(){
        $this->_set_session();
    }

    public function _set_session(){
        session_start();
    }

    function set_userdata($session_name,$session_value){        
        //$_SESSION[$session_name] = $session_value;
		
		$expire = time()+365*24*3600;		
		setcookie($session_name, $session_value, $expire, "/");		
		
    }

    function userdata($session_name){
		/*
        if(isset($_SESSION[$session_name])) {
            return $_SESSION[$session_name];
        } else {
            return false;  
        }
		*/
		return isset($_COOKIE[$session_name])&&!empty($_COOKIE[$session_name])?$_COOKIE[$session_name]:"";		
		
        
    }

    function unset_userdata($session_name){
		/*
        if(isset($_SESSION[$session_name]))
            unset($_SESSION[$session_name]);
		*/
		setcookie($session_name, "", (time()-3600));	
    }
    
    public function session_destroy(){
          session_destroy();
    }

}
?>