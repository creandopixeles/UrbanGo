<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistroModel extends Model
{
    protected $table = 'registro'; // Cambia esto al nombre de tu tabla
    protected $primaryKey = 'id'; // Cambia esto si tu clave primaria tiene otro nombre
    protected $allowedFields = [
        'tipo_beneficiario_id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'sexo',
        'correo',
        'documento',
        'id_estado_validacion',
        'password'
    ]; // Lista de campos que se pueden insertar/actualizar
    protected $returnType = 'object';
    protected $useTimestamps = true; // Si tienes columnas created_at y updated_at

    /**
     * Insertar un nuevo beneficiario en la base de datos.
     *
     * @param array $data Datos del beneficiario.
     * @return bool|int ID del nuevo registro o false en caso de error.
     */
    public function insertar(array $data)
    {

        return $this->insert($data, true); // true para retornar el ID del registro
    }

    /**
     * Verificar si un correo ya existe en la base de datos.
     *
     * @param string $email Correo a verificar.
     * @return bool True si existe, false si no.
     */
    public function check_email(string $email): bool
    {
        return $this->where('correo', $email)->countAllResults() > 0;
    }

    // Método para actualizar por ID
    public function updatePorId($id, $data)
    {
        return $this->update($id, $data);
    }
}
