<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */
Load::models('usuarios');
class IndexController extends AppController
{
	public function index()
	{
		View::template('login');
		$this->title = "Login";


		if (Input::hasPost("email","clave"))
		{
			$usuarios = new Usuarios();
			$email = Input::post("email");
			$pwd = $usuarios->encriptar(Input::post("clave"));
			$auth = new Auth("model", "class: usuarios", "email: $email", "clave: $pwd");

			if ($auth->authenticate())
			{
				header('Location: ../seguidor/');
			} 
			else 
			{
				echo"<script>alert('Email o contraseña inválidos')</script>";
			}
		}
	}

	public function register(){
		View::template('login');
		if (Input::post('usuarios')) {
			$post = Input::post('usuarios');
			if ($post['clave'] != $post['clave2']) {
				echo"<script>alert('Las contraseñas no coinciden!')</script>";
				return;
			}

			$usuario = new Usuarios(Input::post("usuarios"));
			$usuario->clave = $usuario->encriptar($usuario->clave);
			$usuario->nivel = 2;
			if ($usuario->save()) {
				echo"<script>alert('Usuario registrado con éxito!')</script>";

			}else{
				echo"<script>alert('No se realizó el registro!')</script>";
			}
		}
	}

}
