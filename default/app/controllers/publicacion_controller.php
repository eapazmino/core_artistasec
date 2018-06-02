<?php

/**
 * Controlador para las acciones y vistas con el usuario
 */
class PublicacionController extends AppController
{

    public function listar()
    {
         $this->data = (new Publicacion)->find();
    }

    public function create($id)
     {
         $this->publicacion = (new Publicacion)->find($id);
        //se verifica si se ha enviado via POST los datos
        if (Input::hasPost('publicacion')) {
        	$obj = new Publicacion;
            //Intenta guardar los cambios
            if ($obj->saveWithPhoto(Input::post('publicacion'))) {
                 //Mensaje de éxito y retorna al listado
                 Flash::valid('Publicacion Creada');
                 return Redirect::to();
            }
            //Si falla se hacen persistentes los datos en el formulario
            $this->publicacion = Input::post('publicacion');
            return;
        }
    }

    public function update_photo($id)//validación 'int' con php7
    {
        //Carga los datos del usuario
        $this->publicacion = (new Publicacion)->find($id);
        //se verifica si se ha enviado via POST los datos
        if (Input::hasPost('publicacion')) {
            //Si falla al intentar actualizar
            if ($this->publicacion->updatePhoto()) {
                //Mensaje de éxito y retorna al listado
                Flash::valid('Foto de la publicacion ha sido actualizada');
                return Redirect::to();
            }
            //se hacen persistentes los datos en el formulario
            $this->publicacion = Input::post('publicacion');
            return;
        }
    }
}
