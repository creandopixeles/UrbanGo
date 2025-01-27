<?php

namespace App\Controllers;

use App\Models\LugaresModel;



class LugaresController extends BaseController
{

    
    public function lista()
    {
        $lugaresModel = new LugaresModel();
        $dataLugares = $lugaresModel->obtenerTodosRegistros();
        foreach($dataLugares as $l){
            if($l->status == 1){
                $l->status = 'Activo';
            }
            else{
                $l->status = 'Inactivo';
            }
        }
        $data = [
            'menu' => view('layouts/menu'),
            'head' => view('layouts/head'),
            'nav' => view('layouts/nav'),

            'footer' => view('layouts/footer'),
            'js' => view('layouts/js'),
            'lugares' => $dataLugares,
            
        ];
        return view('lugares/lista', $data);
    }

    public function guardar()
    {

        // Crear instancia del modelo
        $lugaresModel = new LugaresModel();
        // Obtener los datos enviados desde un formulario o POST
        $dataLugares = $this->request->getPost();
        // Insertar los datos en la base de datos
        $lugaresModel->insert($dataLugares);
        // Retornar una respuesta exitosa
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Datos guardados exitosamente'
        ])->setStatusCode(200);


    }
}
