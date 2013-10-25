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
    private $fecha_creacion;
    private $id_user;
    private $id_cuaderno;


    public function __construct() {
        
    }
    
    public function exchangeArray($data) {
        $this->id               = (isset($data['id'])) ? $data['id'] : null;
        $this->descripcion      = (isset($data['descripcion'])) ? $data['descripcion'] : null;
        $this->fecha_creacion   = (isset($data['fecha_creacion'])) ? $data['fecha_creacion'] : null;
        $this->id_user     	= (isset($data['id_user'])) ? $data['id_user'] : null;
        $this->id_cuaderno      = (isset($data['id_cuaderno'])) ? $data['id_cuaderno'] : null;
    }
    
    public function totalnotas(){
        
        $db = ntDB::getInstance();
        $mysqlVerUsuario="select * from notes";
        $resultado= $db->prepare( $mysqlVerUsuario );
        $resultado->execute();
        return $resultado->fetchAll();
        
      //return $this->usuario;
    }
    
    public static function totalnotas2(){
        
        try {
            $db = ntDB::getInstance();
            $sqlnotas='select id, id_user, id_notebook, descripcion, fecha_creacion from notes';
            $resultado= $db->prepare( $sqlnotas );
            $resultado->execute();

            $notas = array();

            while ( $row = $resultado->fetch() ) {
                $nota = new class_admin_notas();
                $nota->exchangeArray($row);
                $notas[] = $nota;
            }

            return $notas;
        
        }catch(Exception $e){
            return array();
            return $e->getMessage();
        }
        
      //return $this->usuario;
    }
    
    public function insert( $descripcion, $id_user,$id_cuaderno ){
        try{
            $now = date('Y/m/d h:i:s');
            $db = ntDB::getInstance();
            $sql = ' insert into notes (id_user, id_notebook,  descripcion,fecha_creacion) values (?,?,?,?) ';
            $s = $db->prepare( $sql );
            $s->bindParam( 1, $id_user, PDO::PARAM_INT );
            $s->bindParam( 2, $id_cuaderno, PDO::PARAM_INT  );
            $s->bindParam( 4, $descripcion );
            $s->bindParam( 5, $now );
            $s->execute();
            
            $this->id=$db->lastInsertId();
            $this->descripcion=$descripcion;
            $this->fecha_creacion=$now;
            $this->id_user=$id_user;
            $this->id_cuaderno=$id_cuaderno;
            
            return true;
            
        }catch(Exception $e){
            return false;
            return $e->getMessage();
        }
    }
    
    
    
    public function getId() {
        return $this->id;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }
    
    public function getIdUser() {
        return $this->id_user;
    }
    
    public function getIdCuaderno() {
        return $this->id_cuaderno;
    }
}

?>
