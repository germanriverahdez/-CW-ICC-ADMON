<?php

class UserController extends Controller{
    function render(){   
        $template=new Template;
        echo $template->render('login.htm');
    }
    function beforeroute(){      
    }
    function authenticate() {
            $username = $this->f3->get('POST.username');
            $password = $this->f3->get('POST.password');

            $user = new User($this->db);
            $user->getByName($username);

            if($user->dry()){
                //echo 'User does not exist.';
                $this->f3->reroute('/login');
            }
           // $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
            if(password_verify($password, $user->password)){
            //    if(password_verify('rasmuslerdorf', $hash)){
                //echo 'password OK';
                $this->f3->set('SESSION.user', $username);
                $this->f3->reroute('/');
            } else {
                //echo 'password NOT OK';
                $this->f3->reroute('/login');
            }
        }
}