<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Llave primaria de la tabla
    protected $allowedFields = [
        'usuario',
        'password',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'status',
        'rol_id',
        'correo',
        'celuar'
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

    /**
     * Obtener todos los usuarios.
     * 
     * @return array Lista de usuarios.
     */
    public function obtenerTodosUsuarios()
    {
        // Realizando el join con la tabla roles usando el campo id_rol
        return $this->select('usuarios.*, roles.rol')
            ->join('roles', 'usuarios.rol_id = roles.id')
            ->findAll();
    }

    /**
     * Obtener usuarios según una condición.
     * 
     * @param array $where Condición para filtrar usuarios.
     * @return array|null Lista de usuarios o null si no hay coincidencias.
     */
    public function obtenerUsuariosPorWhere(array $where)
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
    public function editarUsuarioPorWhere(array $where, array $data)
    {
        return $this->where($where)->set($data)->update();
    }

    public function verificar_usuario($usuario)
    {

        // Buscar al usuario en la base de datos por su nombre de usuario
        return $this->where('usuario', $usuario) // 'usuario' debe coincidir con el nombre del campo en tu tabla
            ->first(); // Retorna el primer registro encontrado
    }
}
