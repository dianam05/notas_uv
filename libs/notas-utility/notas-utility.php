<?php

class notas_utility {
//put your code here
    public function __construct() {
        
    }
    
    public static function login( $usuario,$password ){
        try{
            $db = ntDB::getInstance();
            $sql = ' select count(id) as total,id,username,password,email,id_profile,estado from user where username = ? and password = ? and estado = \'1\' ';
            $s = $db->prepare( $sql );
            $s->bindParam( 1, $usuario );
            $s->bindParam( 2, $password );
            $s->execute();
            $row = $s->fetch();
            if( $row['total'] == 1 ){
                header('Location:index.php');
                $_SESSION['nt_username']=$row['username'];
            }else{
                header('Location: '.ROOT_URL.'login.php?m=FAIL');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>
