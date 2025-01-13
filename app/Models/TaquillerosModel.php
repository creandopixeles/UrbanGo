<?php

namespace App\Models;

use CodeIgniter\Model;

class TaquillerosModel extends Model
{
    protected $table = 'taquilleros'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Llave primaria de la tabla
    protected $allowedFields = [
        'id',
        'user_id',
    ]; // Campos permitidos para operaciones de inserción y actualización
    protected $useTimestamps = true; // Utilizar campos de timestamp automáticos
    protected $returnType = 'object';

    /**
     * Insertar un nuevo usuario.
     * 
     * @param array $data Datos del usuario a insertar.
     * @return bool|int Retorna false en caso de error o el ID del usuario insertado.
     */
    public function insertarUsuario(array $data)
    {
        return $this->insert($data);
    }
}
