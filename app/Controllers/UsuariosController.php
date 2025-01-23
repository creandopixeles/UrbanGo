<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\RolesModel;
use App\Models\TaquillerosModel;
use App\Models\ChoferesModel;
use App\Models\ConcecionariosModel;
use App\Models\AdministradoresModel;



class UsuariosController extends BaseController
{
    // Especificamos que este controlador usa la sesión de 'usuario'
    protected $sessionType = 'usuario';

    public function login()
    {
        return view('usuarios/login'); // 'login' es el nombre de la vista
    }

    public function validar_acceso()
    {
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $usuariosModel = new UsuariosModel();
        $usuarioData = $usuariosModel->verificar_usuario($usuario);

        if ($usuarioData) {
            if (password_verify($password, $usuarioData->password)) {
                $nombre_completo = $usuarioData->nombre . ' ' . $usuarioData->apellido_paterno . ' ' . $usuarioData->apellido_materno;

                $session = session();
                $session->remove('urbango_session'); // Limpia cualquier sesión previa
                $sessionData = [
                    "idusuario" => $usuarioData->id,
                    'nombre' => $nombre_completo,
                    'usuario' => $usuarioData->usuario,
                ];

                // Establece la sesión con el tipo de usuario "usuario"
                $session->set('urbango_session', $sessionData);
                $session->regenerate(); // Regenera el ID de sesión

                $response = [
                    'code' => 'is_ok',
                    'error_message' => 'Sesión validada',
                ];
            } else {
                $response = [
                    'code' => "invalid_password",
                    'error_message' => 'Contraseña incorrecta.',
                ];
            }
        } else {
            $response = [
                'code' => "user_not_found",
                'error_message' => 'El usuario no existe.',
            ];
        }

        return $this->response->setJSON($response);
    }


    public function logout()
    {
        // Obtén la instancia de la sesión
        $session = session();

        // Borra los datos específicos de la sesión del usuario
        $session->remove('urbango_session');

        // Opcional: Destruye toda la sesión (elimina todos los datos de sesión)
        $session->destroy();

        // Redirige al usuario a la página de inicio de sesión o cualquier otra
        return redirect()->to('/login');
    }



    public function registro()
    {
        return view('registro');
    }

    public function lista()
    {
        $usuariosModel = new UsuariosModel();
        $rolesModel = new RolesModel();

        $dataUsuarios = $usuariosModel->obtenerTodosUsuarios();
        $dataRoles = $rolesModel->obtenerTodosRoles();

        $data = [
            'menu' => view('layouts/menu'),
            'head' => view('layouts/head'),
            'nav' => view('layouts/nav'),

            'footer' => view('layouts/footer'),
            'js' => view('layouts/js'),
            "usuarios" => $dataUsuarios,
            "roles" => $dataRoles

        ];
        return view('usuarios/lista', $data);
    }

    public function guardar()
    {

        $usuariosModel = new UsuariosModel();
        $taquillerosModel = new TaquillerosModel();
        $choferesModel = new ChoferesModel();
        $concecionariosModel = new ConcecionariosModel();
        $administradoresModel = new AdministradoresModel();
        // Preparar los datos para insertar

        $data = [
            'usuario' => $this->request->getPost('usuario'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'nombre' => $this->request->getPost('nombre'),
            'apellido_paterno' => $this->request->getPost('apellido_paterno'),
            'apellido_materno' => $this->request->getPost('apellido_materno'),
            'status' => 1,
            'rol_id' => $this->request->getPost('rol')
        ];


        // Insertar los datos y obtener el ID del beneficiario
        $id = $usuariosModel->insert($data);

        if (!$id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al guardar el beneficiario.',
            ]);
        }

        switch ($this->request->getPost('rol')) {
            case 1:
                $administradoresModel->insert(array('user_id' => $id));
                break;
            case 2:
                $concecionariosModel->insert(array('user_id' => $id));
                break;
            case 3:
                $choferesModel->insert(array('user_id' => $id));
                break;
            case 4:
                $taquillerosModel->insert(array('user_id' => $id));
                break;
        }


        // Devolver respuesta de éxito
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Registro exitoso.',
        ]);
    }

    public function verifica_usuario_disponible()
    {
        // Carga el modelo de usuarios
        $usuariosModel = new UsuariosModel();

        // Obtén el nombre de usuario desde la solicitud
        $usuario = $this->request->getPost('usuario');

        // Define la condición para buscar el usuario
        $condicion = ['usuario' => $usuario];

        // Usa el método obtenerUsuariosPorWhere para verificar si el usuario existe
        $usuarioExiste = $usuariosModel->obtenerUsuariosPorWhere($condicion);

        if (!empty($usuarioExiste)) {
            // Si el usuario existe, responde con un mensaje de error
            return $this->response->setJSON(['success' => false, 'message' => 'El usuario ya existe.']);
        } else {
            // Si no existe, responde con un mensaje de éxito
            return $this->response->setJSON(['success' => true, 'message' => 'El usuario está disponible.']);
        }
    }
}
