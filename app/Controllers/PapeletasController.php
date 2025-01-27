<?php

namespace App\Controllers;

use App\Models\PapeletasModel;
use App\Models\UsuariosModel;
use App\Models\LugaresModel;
use App\Models\UnidadesModel;
use App\Models\AndenesModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

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
            'andenes' => $dataAndenes
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
        $dataPapeletas = $papeletasModel->obtenerPapeletas();
        foreach ($dataPapeletas as $p) {
            $p->info_status = ($p->status == 1) ? '<span class="badge bg-primary">Activo</span>' : '<span class="badge bg-danger">Eliminado</span>';
        }
        $data = [
            'menu' => view('layouts/menu'),
            'head' => view('layouts/head'),
            'nav' => view('layouts/nav'),

            'footer' => view('layouts/footer'),
            'js' => view('layouts/js'),
            "papeletas" => $dataPapeletas
        ];
        return view('papeletas/lista', $data);
    }

    public function impresion($id)
    {
        // Cargar el modelo que contiene los datos de la papeleta
        $papeletasModel = new PapeletasModel();
        $dataPapeleta = $papeletasModel->obtenerPapeletasPorId($id);


        // Generar el código QR
        $qrCodeData = "https://127.0.0.1/papeleta/get-info/" . $dataPapeleta->no_papeleta; // Por ejemplo, un enlace con el no_papeleta
        $this->generateQRCode($qrCodeData, $id);


        // Cargar la vista para el contenido del PDF
        $html = view('pdf/papeleta', [
            'papeleta' => $dataPapeleta
        ]);

        // Crear el PDF
        $dompdf = new Dompdf();
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->set_option('isHtml5ParserEnabled', true); // Si usas etiquetas modernas
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Descargar el PDF
        return $dompdf->stream('papeleta_' . $dataPapeleta->id . '-' . date('Y-m-d H:i') . '.pdf', ['Attachment' => 1]);
    }



    public function generateQRCode($data, $id)
    {

        $path = FCPATH  . '/qr/' . $id . '.png';

        $writer = new PngWriter();

        $qrCode = new QrCode(
            data: $data,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );
        $writer->write($qrCode)->saveToFile($path);
    }
}
