<?php

/**
 * Controlador para las acciones y vistas con el usuario
 */
class CriticaController extends AppController
{

    public function index()
    {
         $this->data = (new Critica)->find();
    }

    public function create($id)
    {

        if (Input::hasPost('critica')) {

            $critica = new Critica(Input::post('critica'));
            //En caso que falle la operación de guardar
            if ($critica->create()) {
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
        $critica = new Critica();
 
        //se verifica si se ha enviado el formulario (submit)
        if (Input::hasPost('critica')) {
 
            if ($critica->update(Input::post('critica'))) {
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }
 
        //Aplicando la autocarga de objeto, para comenzar la edición
        //Si en la vista usamos menus.nombre, la autocarga buscará una variable llamada $menus
        //para apoyar los helpers de Form
        $this->critica = $critica->find_by_id((int) $id);
    }

    public function reporte()
    {
         $this->data = (new Critica)->find();

         
    }


}
