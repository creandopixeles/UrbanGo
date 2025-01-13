<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table = 'roles'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Llave primaria de la tabla
    protected $allowedFields = [
        'rol',
    ]; // Campos permitidos para operaciones de inserción y actualización
    protected $useTimestamps = true; // Utilizar campos de timestamp automáticos
    protected $returnType = 'object';

    /**
     * Insertar un nuevo usuario.
     * 
     * @param array $data Datos del usuario a insertar.
     * @return bool|int Retorna false en caso de error o el ID del usuario insertado.
     */
    public function insertarRol(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Obtener todos los usuarios.
     * 
     * @return array Lista de usuarios.
     */
    public function obtenerTodosRoles()
    {
        // Realizando el join con la tabla roles usando el campo id_rol
        return $this->findAll();
    }

    /**
     * Obtener usuarios según una condición.
     * 
     * @param array $where Condición para filtrar usuarios.
     * @return array|null Lista de usuarios o null si no hay coincidencias.
     */
    public function obtenerRolesPorWhere(array $where)
    {
        return $this->where($where)->findAll();
    }

    /**
     * Editar usuarios según una condición.
     * 
     * @param array $where Condición para filtrar usuarios a actualizar.
     * @param array $data Datos a actualizar.
     * @return bool Retorna true si se actualizaron registros, false en caso contrario.
     */
    public function editarRolesPorWhere(array $where, array $data)
    {
        return $this->where($where)->set($data)->update();
    }
}
