<?php

class Class_restrict {
    

    public function __construct() {
        
    }
    
    public static function restrict_page(){
        
        if( !isset($_SESSION['nt_username']) || $_SESSION['nt_username'] == ''){
            header('Location:login.php');
        }
    }
}
?>
