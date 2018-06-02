<?php

/**
 * Controlador para las acciones y vistas con el usuario
 */
class SeguidorController extends AppController
{

    public function index()
    {
         $this->data = (new Seguidor)->find();
    }

    public function create()
    {

        if (Input::hasPost('seguidor')) {

            $seguidor = new Seguidor(Input::post('seguidor'));
            //En caso que falle la operación de guardar
            if ($seguidor->create()) {
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
        $seguidor = new Seguidor();
 
        //se verifica si se ha enviado el formulario (submit)
        if(Input::hasPost('seguidor')){
 
            if($seguidor->update(Input::post('seguidor'))){
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to();
            } else {
                Flash::error('Falló Operación');
            }
        } else {
            //Aplicando la autocarga de objeto, para comenzar la edición
            $this->seguidor = $seguidor->find_by_id((int)$id);
        }
    }
}
