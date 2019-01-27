<?php
//Se crea acceso a la tabla contenidos
class Urls extends DB\SQL\Mapper{
    public function __construct(DB\SQL $db){
        parent::__construct($db,'urls');
    }
    public function all(){
        $this->load();
        return $this->query;
    }
    public function getById($id_url){   
        $this->load(array('id_url=?',$id_url));
        return $this->query;
    }
}