<?php

namespace App\Controllers;

use App\Models\AndenesModel;



class AndenesController extends BaseController
{

    
    public function lista()
    {
        $AndenesModel = new AndenesModel();
        $dataAndenes = $AndenesModel->obtenerTodosRegistros();
        foreach($dataAndenes as $l){
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
            'andenes' => $dataAndenes,
            
        ];
        return view('andenes/lista', $data);
    }

    public function guardar()
    {

        // Crear instancia del modelo
        $andenesModel = new AndenesModel();
        // Obtener los datos enviados desde un formulario o POST
        $dataAndenes = $this->request->getPost();
        // Insertar los datos en la base de datos
        $andenesModel->insert($dataAndenes);
        // Retornar una respuesta exitosa
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Datos guardados exitosamente'
        ])->setStatusCode(200);


    }
}
