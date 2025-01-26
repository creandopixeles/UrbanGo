<?php

namespace App\Controllers;

use App\Models\PapeletasModel;
use App\Models\UsuariosModel;
use App\Models\LugaresModel;
use App\Models\UnidadesModel;
use App\Models\AndenesModel;



class PapeletasController extends BaseController
{

    public function nueva()
    {
        $usuariosModel = new UsuariosModel();
        $lugaresModel = new LugaresModel();
        $unidadesModel = new UnidadesModel();
        $andenesModel = new AndenesModel();

        $dataUsuarios = $usuariosModel->obtenerUsuariosPorWhere(array('rol_id' => 3, 'status' => 1));
        $dataUnidades = $unidadesModel->obtenerUnidadesPorWhere(array('status' => 1));

        $dataLugares = $lugaresModel->obtenerLugaresPorWhere(array('status' => 1));
        $dataAndenes = $andenesModel->obtenerAndenesPorWhere(array('status' => 1));

        $data = [
            'menu' => view('layouts/menu'),
            'head' => view('layouts/head'),
            'nav' => view('layouts/nav'),

            'footer' => view('layouts/footer'),
            'js' => view('layouts/js'),
            'usuarios' => $dataUsuarios,
            'lugares' => $dataLugares,
            'unidades' => $dataUnidades,
            'andenes' =>$dataAndenes
        ];
        return view('papeletas/nueva', $data);
    }



    public function guardar()
    {

        // Crear instancia del modelo
        $PapeletasModel = new PapeletasModel();
        // Obtener los datos enviados desde un formulario o POST
        $dataPapeleta = $this->request->getPost();
        // Insertar los datos en la base de datos
        try {
            $PapeletasModel->insert($dataPapeleta);

            // Retornar una respuesta exitosa
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Datos guardados exitosamente'
            ])->setStatusCode(200);
        } catch (\Exception $e) {
            // Retornar error si ocurre algo
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No se pudo guardar la papeleta',
                'error' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }




    public function lista()
    {
        $papeletasModel = new PapeletasModel();

        $dataRegistros = $papeletasModel->obtenerTodosRegistros();


        $data = [
            'menu' => view('layouts/menu'),
            'head' => view('layouts/head'),
            'nav' => view('layouts/nav'),

            'footer' => view('layouts/footer'),
            'js' => view('layouts/js'),
            "registros" => $dataRegistros
        ];
        return view('papeletas/lista', $data);
    }
}
