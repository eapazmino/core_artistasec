<?php

/**
 * Controlador para las acciones y vistas con el usuario
 */
class EventoController extends AppController
{
    public function index()
    {
        
    }

    public function listar()
    {
         $this->data = (new Evento)->find();
    }

    public function create()
    {

        if (Input::hasPost('evento')) {

            $evento = new Evento(Input::post('evento'));
            //En caso que falle la operación de guardar
            if ($evento->create()) {
                Flash::valid('Operación exitosa');
                //Eliminamos el POST, si no queremos que se vean en el form
                Input::delete();
                return;
            }
            
            Flash::error('Falló Operación');
        }
    }

    public function edit($id)
    {
        $evento = new Evento();
 
        //se verifica si se ha enviado el formulario (submit)
        if(Input::hasPost('evento')){
 
            if($evento->update(Input::post('evento'))){
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to();
            } else {
                Flash::error('Falló Operación');
            }
        } else {
            //Aplicando la autocarga de objeto, para comenzar la edición
            $this->evento = $evento->find_by_id((int)$id);
        }
    }
}
