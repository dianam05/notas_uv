<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_admin_resources
 *
 * @author Desarrollador1
 */
class class_admin_resources {
    
    private $id;
    private $id_tipo;
    private $id_nota;
    private $id_user;
    private $nombre;
    private $fecha_creacion;


    public function __construct() {
        
    }
    
      public function insertResource($id_nota,$id_user,$nombre){
        try{
            $now = date('Y/m/d h:i:s');
            $db = ntDB::getInstance();
            $sql = ' insert into resources (id_nota, id_user,  nombre,fecha_creacion) values (?,?,?,?) ';
            $s = $db->prepare( $sql );
            $s->bindParam( 1, $id_nota, PDO::PARAM_INT );
            $s->bindParam( 2, $id_user, PDO::PARAM_INT );
            $s->bindParam( 3, $nombre );
            $s->bindParam( 4, $now );
            $s->execute();
            
            $this->id=$db->lastInsertId();
            $this->id_nota=$id_nota;
            $this->id_user=$id_user;
            $this->nombre=$nombre;
            $this->fecha_creacion=$now;
            
            return true;
            
        }catch(Exception $e){
            //return false;
            return $e->getMessage();
        }
    }
    //put your code here
}

?>
