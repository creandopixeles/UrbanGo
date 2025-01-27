<?php

namespace App\Models;

use CodeIgniter\Model;

class PapeletasModel extends Model
{
    protected $table = 'papeletas'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Llave primaria de la tabla
    protected $allowedFields = [
        'no_papeleta',
        'id_unidad',
        'id_anden',
        'id_lugar_origen',
        'id_lugar_destino',
        'id_chofer',
        'color',
        'fecha',
        'hora'
    ]; // Campos permitidos para operaciones de inserción y actualización
    protected $useTimestamps = true; // Utilizar campos de timestamp automáticos
    protected $returnType = 'object';

    /**
     * Insertar un nuevo usuario.
     * 
     * @param array $data Datos del usuario a insertar.
     * @return bool|int Retorna false en caso de error o el ID del usuario insertado.
     */
    public function insertar(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Obtener todos los registros de la tabla, ordenados por la fecha de creación más reciente.
     *
     * @return object Lista de registros.
     */
    public function obtenerTodosRegistros()
    {
        return $this->orderBy('created_at', 'DESC')->findAll(); // Ordena por created_at en orden descendente
    }

    public function obtenerPapeletas()
    {
        return $this->db->table('papeletas')
            ->select('
            papeletas.no_papeleta,
            papeletas.fecha,
            papeletas.hora,
            papeletas.created_at,
            unidades.no_unidad,
            andenes.anden,
            lugar_origen.lugar AS lugar_origen,
            lugar_destino.lugar AS lugar_destino,
            usuarios.nombre,
            usuarios.apellido_paterno,
            usuarios.apellido_materno,
            papeletas.color,
            papeletas.id,
            papeletas.status
        ')
            ->join('unidades', 'papeletas.id_unidad = unidades.id')
            ->join('andenes', 'papeletas.id_anden = andenes.id')
            ->join('lugares AS lugar_origen', 'papeletas.id_lugar_origen = lugar_origen.id')
            ->join('lugares AS lugar_destino', 'papeletas.id_lugar_destino = lugar_destino.id')
            ->join('usuarios', 'papeletas.id_chofer = usuarios.id')
            ->orderBy('papeletas.created_at', 'DESC') // Ordena por created_at descendente
            ->get()
            ->getResult(); // Devuelve un array de objetos
    }

    public function obtenerPapeletasPorId($id)
    {
        return $this->select('papeletas.no_papeleta, papeletas.fecha, papeletas.hora, papeletas.created_at, 
                              unidades.no_unidad, andenes.anden, lugar_origen.lugar AS lugar_origen, 
                              lugar_destino.lugar AS lugar_destino, usuarios.nombre, usuarios.apellido_paterno, 
                              usuarios.apellido_materno, papeletas.color, papeletas.id')
            ->join('unidades', 'papeletas.id_unidad = unidades.id')
            ->join('andenes', 'papeletas.id_anden = andenes.id')
            ->join('lugares AS lugar_origen', 'papeletas.id_lugar_origen = lugar_origen.id')
            ->join('lugares AS lugar_destino', 'papeletas.id_lugar_destino = lugar_destino.id')
            ->join('usuarios', 'papeletas.id_chofer = usuarios.id')
            ->where('papeletas.id', $id)
            ->first(); // Utilizamos first() para obtener solo un registro
    }
}
