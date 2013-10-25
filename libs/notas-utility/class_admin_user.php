<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_admin_user
 *
 * @author Desarrollador1
 */
class class_admin_user {
     
    private $id;
    private $username;
    private $password;
    private $email;
    private $id_profile;
    private $fecha_registro;
    private $estado;
    
    
    public function __construct() {
        //$this->usuario=array();
    }
    
    public function exchangeArray($data) {
        $this->id               = (isset($data['id'])) ? $data['id'] : null;
        $this->username         = (isset($data['username'])) ? $data['username'] : null;
        $this->password         = (isset($data['password'])) ? $data['password'] : null;
        $this->email     	= (isset($data['email'])) ? $data['email'] : null;
        $this->id_profile       = (isset($data['id_profile'])) ? $data['id_profile'] : null;
        $this->fecha_registro   = (isset($data['fecha_registro'])) ? $data['fecha_registro'] : null;
        $this->estado           = (isset($data['estado'])) ? $data['estado'] : null;
    }
    
    public function getUser(){
        
        $db = ntDB::getInstance();
        $mysqlVerUsuario="select * from user";
        $resultado= $db->prepare( $mysqlVerUsuario );
        $resultado->execute();
        return $resultado->fetchAll();
        
      //return $this->usuario;
    }
    
    public static function getAllUser(){
        
        try {
            $db = ntDB::getInstance();
            $mysqlVerUsuario='select id, username, password, email, id_profile, fecha_registro, estado from user';
            $resultado= $db->prepare( $mysqlVerUsuario );
            $resultado->execute();

            $users = array();

            while ( $row = $resultado->fetch() ) {
                $user = new class_admin_user();
                $user->exchangeArray($row);
                $users[] = $user;
            }

            return $users;
        
        }catch(Exception $e){
            return array();
            return $e->getMessage();
        }
        
      //return $this->usuario;
    }
    
    public function createUser($username, $password, $email, $id_profile, $estado){
        
       try{
            $now = date('Y/m/d h:i:s');
            $db = ntDB::getInstance();
            $sql = ' insert into user (username, password,  email, id_profile, fecha_registro, estado) values (?,?,?,?,?,?) ';
            $s = $db->prepare( $sql );
            $s->bindParam( 1, $username );
            $s->bindParam( 2, $password );
            $s->bindParam( 3, $email );
            $s->bindParam( 4, $id_profile, PDO::PARAM_INT );
            $s->bindParam( 5, $now );
            $s->bindParam( 6, $estado, PDO::PARAM_INT );
            $s->execute();
            
            $this->id=$db->lastInsertId();
            $this->username=$username;
            $this->password=$password;
            $this->email=$email;
            $this->id_profile=$id_profile;
            $this->fecha_registro=$now;
            $this->estado=$estado;
            
            return true;
            
        }catch(Exception $e){
            return false;
            return $e->getMessage();
        }
       
        
    }
    
    public function getTipo() {
        if($this->id_profile == '1'){
            return 'Admin';
        }elseif($this->id_profile == '2'){
            return 'Usuario';
        }else{
            return 'Desconocido';
        }
    }
    
    public function getTipoEstado() {
        if($this->estado == '1'){
            return 'Activo';
        }elseif($this->estado == '0'){
            return 'Inactivo';
        }else{
            return 'Desconocido';
        }
    }

    public function getId() {
        return $this->id;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getIdProfile() {
        return $this->id_profile;
    }
    
    public function getFechaRegistro() {
        return $this->fecha_registro;
    }
    
    public function getEstado() {
        return $this->estado;
    }
}

?>
