<?php
//Se crea acceso a la tabla contenidos
class Contenidos extends DB\SQL\Mapper{
    public function __construct(DB\SQL $db){
        parent::__construct($db,'contenidos');
    }
    public function all(){
        $this->load();
        return $this->query;
    }
    public function getById($id_contenido){
        $this->load(array('id_contenido=?',$id_contenido));
        return $this->query;
    }
    public function guardar($id_contenido){
        $this->load(array('id_contenido=?',$id_contenido));
        $this->copyFrom('POST');
        $this->update();
    }
}