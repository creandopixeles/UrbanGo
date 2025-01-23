<?php

namespace App\Controllers;

// use App\Models\RegistrosModel;
// use App\Models\TipoBeneficiariosModel;

use CodeIgniter\Email\Email;


class PapeletasController extends BaseController
{

    public function nueva()
    {
        $data = [
            'menu' => view('layouts/menu'),
            'head' => view('layouts/head'),
            'nav' => view('layouts/nav'),

            'footer' => view('layouts/footer'),
            'js' => view('layouts/js')
        ];
        return view('papeletas/nueva', $data);
    }


    public function generar()
    {
        $dataPapeleta = $this->request->getPost();
        var_dump($dataPapeleta);
    }



    public function detalle($id)
    {
        $registrosModel = new RegistrosModel();
        $tipoBeneficiariosModel = new TipoBeneficiariosModel();

        $dataRegistro = $registrosModel->traerPorId($id);

        $dataTipoBeneficiario = $tipoBeneficiariosModel->buscarPorId($dataRegistro->tipo_beneficiario_id);
        $dataRegistro->tipo_beneficiario = $dataTipoBeneficiario->tipo;
        switch ($dataRegistro->tipo_beneficiario_id) {
            case 1:
                $dataRegistro->class_tipo = 'bg-label-primary';
                break;
            case 2:
                $dataRegistro->class_tipo = 'bg-label-warning';
                break;
            case 3:
                $dataRegistro->class_tipo = 'bg-label-info';
                break;
            case 4:
                $dataRegistro->class_tipo = 'bg-label-success';
                break;
            default:
                $dataRegistro->class_tipo = 'bg-label-dark';
                break;
        }

        switch ($dataRegistro->estado_validacion) {
            case 1:
                $dataRegistro->estatus = 'Registrado';
                $dataRegistro->class_estatus = 'bg-label-primary';
                break;
            case 2:
                $dataRegistro->estatus = 'Validado';
                $dataRegistro->class_estatus = 'bg-label-success';
                break;
            case 3:
                $dataRegistro->estatus = 'Rechazado';
                $dataRegistro->class_estatus = 'bg-label-danger';
                break;
            case 4:
                $dataRegistro->estatus = 'Nueva solicitud';
                $dataRegistro->class_estatus = 'bg-label-warning';
                break;
            default:
                $dataRegistro->estatus = 'No identificado';
                $dataRegistro->class_estatus = 'bg-label-dark';
                break;
        }
        $data = [
            'menu' => view('layouts/menu'),
            'head' => view('layouts/head'),
            'nav' => view('layouts/nav'),

            'footer' => view('layouts/footer'),
            'js' => view('layouts/js'),
            "registro" => $dataRegistro
        ];
        return view('registros/detalle', $data);
    }

    public function lista()
    {
        $registrosModel = new RegistrosModel();
        $tipoBeneficiariosModel = new TipoBeneficiariosModel();

        $dataRegistros = $registrosModel->obtenerTodosRegistros();
        foreach ($dataRegistros as $r) {
            $dataTipoBeneficiario = $tipoBeneficiariosModel->buscarPorId($r->tipo_beneficiario_id);
            $r->tipo_beneficiario = $dataTipoBeneficiario->tipo;
            switch ($r->tipo_beneficiario_id) {
                case 1:
                    $r->class_tipo = 'bg-label-primary';
                    break;
                case 2:
                    $r->class_tipo = 'bg-label-warning';
                    break;
                case 3:
                    $r->class_tipo = 'bg-label-info';
                    break;
                case 4:
                    $r->class_tipo = 'bg-label-success';
                    break;
                default:
                    $r->class_tipo = 'bg-label-dark';
                    break;
            }

            switch ($r->estado_validacion) {
                case 1:
                    $r->estatus = 'Registrado';
                    $r->class_estatus = 'bg-label-primary';
                    break;
                case 2:
                    $r->estatus = 'Validado';
                    $r->class_estatus = 'bg-label-success';
                    break;
                case 3:
                    $r->estatus = 'Rechazado';
                    $r->class_estatus = 'bg-label-danger';
                    break;
                case 4:
                    $r->estatus = 'Nueva solicitud';
                    $r->class_estatus = 'bg-label-warning';
                    break;
                default:
                    $r->estatus = 'No identificado';
                    $r->class_estatus = 'bg-label-dark';
                    break;
            }
        }

        $data = [
            'menu' => view('layouts/menu'),
            'head' => view('layouts/head'),
            'nav' => view('layouts/nav'),

            'footer' => view('layouts/footer'),
            'js' => view('layouts/js'),
            "registros" => $dataRegistros
        ];
        return view('registros/lista', $data);
    }

    public function registro()
    {
        $tipoBeneficiariosModel = new TipoBeneficiariosModel();
        $dataTipoBeneficiarios = $tipoBeneficiariosModel->obtenerTodosTipos();
        $data = [
            "tipo" => $dataTipoBeneficiarios
        ];
        return view('beneficiarios/registro', $data);
    }

    public function rechazar($id)
    {
        // Obtén el motivo del cuerpo de la solicitud
        $motivo = $this->request->getPost('motivo');

        // Cargar el modelo
        $registrosModel = new RegistrosModel();

        $dataRegistro = $registrosModel->traerPorId($id);


        // Datos que se enviarán al método editarRegistroPorId
        $data = [
            'estado_validacion' => 3  // Se establece el estado de validación como 3
        ];
        // Llamada al método editarRegistroPorId para actualizar el estado

        $result = $registrosModel->updatePorId($id, $data);

        // Verificar si la actualización fue exitosa

        $email = \Config\Services::email();

        // Configuración de los correos
        $email->setFrom('notificaciones@creandopixeles.com.mx', 'UrbanGo');
        $email->setTo($dataRegistro->correo); // Cambia esto por la dirección del destinatario
        $email->setSubject('Rechazo en la solicitud');
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
                    <h1>Hola estimad@ ' . $dataRegistro->nombre . ',</h1>
                    <p>
                        Lamentamos informarle que su solicitud de registro en el sistema Urbango ha sido rechazada. 
                        Esto puede deberse a diversos motivos, y le invitamos a comunicarse con nosotros si desea 
                        obtener más información o aclaraciones sobre esta decisión.</p>
                    <p>
                        En caso de que necesite realizar alguna consulta o aclaración, por favor no dude en escribirnos al 
                        siguiente correo electrónico: [correo@urbango.com]. 
                        Estaremos encantados de atender su solicitud y proporcionarle la asistencia necesaria.
                    </p>
                    <p>
                        Gracias por su comprensión.
                    </p>
                    <p>
                        Atentamente,
                    </p>
                    <p>
                        El equipo de Urbango
                    </p>
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
        $email->send();


        if ($result) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'La solicitud ha sido rechazada exitosamente.'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Hubo un error al procesar el rechazo.'
            ]);
        }
    }



    public function guardar()
    {

        $registrosModel = new RegistrosModel();
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
            'estado_validacion' => 1,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        ];

        // Insertar los datos y obtener el ID del beneficiario
        $id = $registrosModel->insert($data);

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
            $rutaCarpeta = ROOTPATH . "public/uploads/beneficiarios/$id/";  // Usamos ROOTPATH para acceder a la carpeta public

            if (!is_dir($rutaCarpeta)) {
                mkdir($rutaCarpeta, 0755, true);
            }

            // Mover el archivo a la carpeta creada
            $nombreArchivo = $archivo->getRandomName(); // Generar un nombre único

            $archivo->move($rutaCarpeta, $nombreArchivo);

            // Actualizar la base de datos con el nombre del archivo
            $registrosModel->updatePorId($id, ['documento' => $nombreArchivo]);
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
