<?php

namespace App\Controllers;

use App\Models\RegistroModel;
use App\Models\TipoBeneficiariosModel;
use CodeIgniter\Email\Email;



class BeneficiariosController extends BaseController
{


    public function check_email()
    {
        // Configurar el tipo de respuesta como JSON

        // Obtener el correo desde el cuerpo de la solicitud
        $correo = $this->request->getPost('correo');

        // Instanciar el modelo
        $registroModel = new RegistroModel();

        // Buscar el correo en la base de datos
        $exists = $registroModel->check_email($correo);

        // Retornar la respuesta
        return $this->response->setJSON(['exists' => $exists]);
    }




    // public function test_correo()
    // {

    //     // Intentar enviar el correo
    //     if ($email->send()) {
    //         echo 'Correo enviado correctamente.';
    //     } else {
    //         // Mostrar los errores en caso de fallo
    //         echo 'Error al enviar correo: ' . $email->printDebugger();
    //     }
    // }
}
