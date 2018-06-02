<?php

/**
 * Controlador para las acciones y vistas con el usuario
 */
class ArtistaController extends AppController
{
    public function index()
    {
        
    }

    public function listar($id)
    {
       $this->data = (new Artista)->find();
    }

    public function create()
    {
        //se verifica si se ha enviado via POST los datos
        if (Input::hasPost('artista')) {
            $obj = new Artista;
            //Intenta guardar el usuario junto con la foto
            if ($obj->saveWithPhoto(Input::post('artista'))) {
                //Mensaje de éxito y retorna al listado
                Flash::valid('Artista creado');
                return Redirect::to();
            }
            //Si falla se hacen persistentes los datos en el formulario
            $this->data = Input::post('artista');
            return;
        }
    }

    public function edit($id)
    {
        //Carga los datos del usuario
        $this->artista = (new Artista)->find($id);
        //se verifica si se ha enviado via POST los datos
        if (Input::hasPost('artista')) {
            //Intenta guardar los cambios
            if ($this->artista->update(Input::post('artista'))) {
                //Mensaje de éxito y retorna al listado
                Flash::valid('Artista actualizado');
                return Redirect::to();
            }
            //Si falla se hacen persistentes los datos en el formulario
            $this->artista = Input::post('artista');
            return;
        }
    }

    public function update_photo($id)
    {
        //Carga los datos del usuario
        $this->artista = (new Artista)->find($id);
        //se verifica si se ha enviado via POST los datos
        if (Input::hasPost('artista')) {
            //Si falla al intentar actualizar
            if ($this->artista->updatePhoto()) {
                //Mensaje de éxito y retorna al listado
                Flash::valid('Foto del artista ha sido actualizada');
                return Redirect::to();
            }
            //se hacen persistentes los datos en el formulario
            $this->artista = Input::post('artista');
            return;
        }
    }
}
