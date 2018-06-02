<?php

/**
 * Clase para manejar los datos del usuario, tabla 'user'
 */
class Seguidor extends ActiveRecord
{

    /**
     * Guarda un usuario y sube la foto de un usuario.
     *
     * @param array $data Arreglo con los datos de usuario
     * @return boolean
     * @throws Exception
     */

    public function all()
    {
        return $this->find('order: nombre');
    }
}
