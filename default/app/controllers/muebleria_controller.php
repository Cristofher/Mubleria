<?php
class MuebleriaController extends AppController {
	    public function login()
    {
        if (Input::hasPost("login","password")){
            $pwd = Input::post("password");
            $usuario=Input::post("login");
 
            $auth = new Auth("model", "class: usuarios", "user: $usuario", "password: $pwd");
            if ($auth->authenticate()) {
                Router::redirect("muebleria/home");
            } else {
                Flash::error("Falló");
            }
        }
    }
    	public function home()
    {
        if (!Auth::is_valid()) {
            // El usuario no es valido, lo mandamos al login
            Redirect::to("muebleria/login"); 
        }
    }

    public function salir()
    {
        Auth::destroy_identity();
        Redirect::to("muebleria/login");
    }
    public function plane_blank()
    {
    	if (!Auth::is_valid()) {
            // El usuario no es valido, lo mandamos al login
            Redirect::to("muebleria/login"); 
        }
    }


}