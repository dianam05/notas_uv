<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_admin_notas
 *
 * @author Desarrollador1
 */
class class_admin_notas {
    
    private $id;
    private $descripcion;
    private $fecha;
    private $id_user;
    private $id_cuaderno;


    public function __construct() {
        
    }
    
    public function insert( $descripcion, $id_user,$id_cuaderno ){
        try{
            $now = date('Y/m/d h:i:s');
            $db = ntDB::getInstance();
            $sql = ' insert into notes (id_user, id_notebook,  descripcion,fecha_creacion) values (?,?,?,?,?) ';
            $s = $db->prepare( $sql );
            $s->bindParam( 1, $id_user, PDO::PARAM_INT );
            $s->bindParam( 2, $id_cuaderno, PDO::PARAM_INT  );
            $s->bindParam( 3, $nombre );
            $s->bindParam( 4, $descripcion );
            $s->bindParam( 5, $now );
            $s->execute();
            
            $this->id=$db->lastInsertId();
            $this->descripcion=$descripcion;
            $this->fecha=$now;
            $this->id_user=$id_user;
            $this->id_cuaderno=$id_cuaderno;
            
            return true;
            
        }catch(Exception $e){
            return false;
            return $e->getMessage();
        }
    }
}

?>
