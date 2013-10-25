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
                $_SESSION['nt_user_id']=$row['id'];
            }else{
                header('Location: '.ROOT_URL.'login.php?m=FAIL');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    
    public static function getNotebookUser ($id_user){
        try{
            $db = ntDB::getInstance();
            $sql = ' select id,nombre from notebook where id_user = ? ';
            $s = $db->prepare( $sql );
            $s->bindParam( 1, $id_user );
            $s->execute();
            return $s->fetchAll();
            
        }catch(Exception $e){
            return array();
            return $e->getMessage();
        }
    }
    
    public static function countmodules ($module){
        try{
            $db = ntDB::getInstance();
            
            switch ($module){     
            
                case 'users': 
                    $st = $db->prepare('SELECT count(id)as cant FROM user WHERE estado = 1 ');
                    break;
                case 'cuadernos':
                    $st = $db->prepare('SELECT count(id)as cant FROM notebook  ');
                    break;
                case 'notas':
                    $st = $db->prepare('SELECT count(id)as cant FROM notes  ');
                    break;
                default:
                    
            }
            
            
            $st->execute();
            $row = $st->fetch();
            
            return $row['cant'];
        }catch(Exception $e){
            return -1;
            return $e->getMessage();
        }
    }
}
?>
