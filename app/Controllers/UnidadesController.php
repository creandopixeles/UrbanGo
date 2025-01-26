<?php

namespace App\Controllers;

use App\Models\UnidadesModel;
// use App\Models\TipoBeneficiariosModel;



class UnidadesController extends BaseController
{

    
    public function lista()
    {
        $unidadesModel = new UnidadesModel();
        $dataUnidades = $unidadesModel->obtenerTodosRegistros();
        $data = [
            'menu' => view('layouts/menu'),
            'head' => view('layouts/head'),
            'nav' => view('layouts/nav'),

            'footer' => view('layouts/footer'),
            'js' => view('layouts/js'),
            'unidades' => $dataUnidades,
            
        ];
        return view('unidades/lista', $data);
    }

    public function guardar()
    {

        // Crear instancia del modelo
        $unidadesModel = new UnidadesModel();
        // Obtener los datos enviados desde un formulario o POST
        $dataUnidades = $this->request->getPost();
        // Insertar los datos en la base de datos
        $unidadesModel->insert($dataUnidades);
        // Retornar una respuesta exitosa
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Datos guardados exitosamente'
        ])->setStatusCode(200);


    }
}
