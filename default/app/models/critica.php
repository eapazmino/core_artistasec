<?php

/**
 * Clase para manejar los datos del usuario, tabla 'user'
 */
class Critica extends ActiveRecord
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
        return $this->find('order: calificacion');

    }


     public function getInnerJoin(){
        return $this->find('columns: publicacion.id, seguidor.id, comentario, calificacion',
                           'join: inner join publicacion on publicacion.id = critica.publicacion_id');
    }
}
