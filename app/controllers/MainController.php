<?php

class MainController extends Controller{
    /*
    function render($f3){
     $this->f3->set('view', 'dashboard.htm');
        $template=new Template;
        echo $template->render('layout.htm');
    }
    */

    /*
    private function getContent($content,$db){

        $menu = $db -> exec('
            SELECT u.url
                ,c.titulo
                ,m.id_url
            FROM menus_items m
                ,urls        u
                ,contenidos  c
            WHERE m.id_menu = :id_menu
            AND m.id_url = u.id_url
            AND u.id_contenido = c.id_contenido
            ORDER BY id_url ASC'
            ,array(":id_menu" => $content["id_menu"]));
    }
*/

    function render($f3){

        $contenidos = new Contenidos($this->db);
        $cont = $contenidos->all();

        $f3->set('cont',$cont);
        $template=new Template;
        echo $template->render('template.htm');
    }
    
    function editarcontenido($f3){
      $f3->set('html_title','Edior de contenidos');
      $id_contenido = $f3->get('PARAMS.id_contenido');
      $editcontent = new Contenidos($this->db);
      $ec=$editcontent->getById($id_contenido)[0];
      $f3->set('ec',$ec);
      $ec->copyTo('POST');
      $f3->set('contenido','admin_edit.html');
      
      $id_url = $id_contenido+1;
      $thisurl = new Urls($this->db);
      $tu=$thisurl->getById($id_url)[0];
      $f3->set('tu',$tu);
      $tu->copyTo('POST');

      $templ=new Template;
      echo $templ->render('layout.htm');

    }

  

function edit($f3) {
  $id_contenido = $f3->get('PARAMS.id_contenido');
 
  $contenidoeditado=new Contenidos($this->db);
  //if we don't load it first Mapper will do an insert instead of update when we use save command
 
 $contenidoeditado->load(array('id_contenido=?',$id_contenido));
 
  //overwrite with values just submitted
  $contenidoeditado->copyFrom('POST');
  //$contenidoeditado=$f3->get('POST');

  //$name = $f3->get('POST.name');
  
  $contenidoeditado->guardar($id_contenido);
  //guardar($id_contenido);
  //$contenidoeditado->save();
  // Return to admin home page, new blog entry should now be there
  $f3->reroute('/');
}

function ver($f3){
    $f3->set('html_title','Edior de contenidos');
    $id_contenido = $f3->get('PARAMS.id_contenido');
    $editcontent = new Contenidos($this->db);
    $ec=$editcontent->getById($id_contenido)[0];
    $f3->set('ec',$ec);
    $ec->copyTo('POST');
    $f3->set('contenido','admin_edit.html');
    
    $id_url = $id_contenido+1;
    $thisurl = new Urls($this->db);
    $tu=$thisurl->getById($id_url)[0];
    $f3->set('tu',$tu);
    $tu->copyTo('POST');
    
    //$tpl = $this->getTplValues($content,$db);
    //$tpl=$editcontent->getById($id_contenido)[0];
    $tpl['md']           = \Markdown::instance()->convert($editcontent['md']);
	$f3->set("tpl",$tpl);
    

    $templ=new Template;
    echo $templ->render('layout2.htm');

  }


   // function sayhello(){
     //   echo 'Hello, hello, hello, sayhello dentro de Main';
   // }




}