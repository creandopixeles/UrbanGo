<?php

namespace App\Controllers;

use App\Models\RegistroModel;
use App\Models\TipoBeneficiariosModel;
use CodeIgniter\Email\Email;


class RegistrosController extends BaseController
{
    public function registro()
    {
        $tipoBeneficiariosModel = new TipoBeneficiariosModel();
        $dataTipoBeneficiarios = $tipoBeneficiariosModel->obtenerTodosRoles();
        $data = [
            "tipo" => $dataTipoBeneficiarios
        ];
        return view('beneficiarios/registro', $data);
    }

    public function guardar()
    {

        $registroModel = new RegistroModel();
        // Preparar los datos para insertar

        $fecha_nacimiento = $this->request->getPost('anio') . '-' . $this->request->getPost('mes') . '-' . $this->request->getPost('dia');
        $data = [
            'tipo_beneficiario_id' => $this->request->getPost('tipo_id'),
            'nombre' => $this->request->getPost('nombre'),
            'apellido_paterno' => $this->request->getPost('apellidoPaterno'),
            'apellido_materno' => $this->request->getPost('apellidoMaterno'),
            'fecha_nacimiento' => $fecha_nacimiento,
            'sexo' => $this->request->getPost('sexo'),
            'correo' => $this->request->getPost('correo'),
            'id_estado_validacion' => 1,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        ];

        // Insertar los datos y obtener el ID del beneficiario
        $id = $registroModel->insert($data);

        if (!$id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al guardar el beneficiario.',
            ]);
        }

        // Procesar el archivo cargado
        $archivo = $this->request->getFile('documento');


        if ($archivo && $archivo->isValid()) {
            // Crear una carpeta con el ID del beneficiario
            $rutaCarpeta = WRITEPATH . "uploads/beneficiarios/$id/";

            if (!is_dir($rutaCarpeta)) {
                mkdir($rutaCarpeta, 0755, true);
            }

            // Mover el archivo a la carpeta creada
            $nombreArchivo = $archivo->getRandomName(); // Generar un nombre único

            $archivo->move($rutaCarpeta, $nombreArchivo);

            // Actualizar la base de datos con el nombre del archivo
            $registroModel->updatePorId($id, ['documento' => $nombreArchivo]);
        }

        $email = \Config\Services::email();

        // Configuración de los correos
        $email->setFrom('notificaciones@creandopixeles.com.mx', 'UrbanGo');
        $email->setTo($this->request->getPost('correo')); // Cambia esto por la dirección del destinatario
        $email->setSubject('Confirmacion de registro exitoso');
        $htmlContent = '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Correo de Bienvenida</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0; /* Fondo gris para todo */
                    margin: 0;
                    padding: 0;
                }
                .container {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #ffffff; /* Fondo blanco */
                    padding: 20px;
                    border-radius: 10px;
                }
                .logo {
                    display: block;
                    margin: 0 auto;
                    padding: 20px 0;
                }
                .content {
                    font-size: 16px;
                    color: #333;
                    text-align: center;
                }
                .content h1 {
                    color: #333;
                    font-size: 24px;
                    margin-bottom: 20px;
                }
                .footer {
                    font-size: 14px;
                    color: #777;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <!-- Logo centrado -->
                <img src="https://creandopixeles.com.mx/logo/urbango.png" alt="Logo de Urban Go" class="logo" width=50%>

                <!-- Contenido -->
                <div class="content">
                    <h1>Hola estimad@ ' . $this->request->getPost('nombre') . ',</h1>
                    <p>Gracias por registrarte en la plataforma Urban Go.</p>
                    <p>En breve recibirás una notificación sobre tu proceso de registro.</p>
                </div>

                <!-- Pie de página -->
                <div class="footer">
                    <p>Este es un correo automático, por favor no respondas a este mensaje.</p>
                </div>
            </div>
        </body>
        </html>';

        // Establecer el contenido HTML
        $email->setMessage($htmlContent);

        // Establecer el tipo de correo como HTML
        $email->setMailType('html');
        if ($email->send()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Registro exitoso y correo enviado.',
            ]);
        }
        // Devolver respuesta de éxito
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Registro exitoso.',
        ]);
    }
}
