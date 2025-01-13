<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="<?= base_url('public/assets/') ?>"
    data-template="vertical-menu-template-free">

<?= $head; ?>

<body>
    <div id="rolesData" data-roles='<?= json_encode($roles); ?>'></div>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?= $menu; ?>

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?= $nav; ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Usuarios /</span> Lista</h4>

                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <div class="container">
                                <div class="row justify-content-end align-items-center mt-3">
                                    <div class="col-auto">
                                        <button class="btn btn-info btn-sm btn-modal" id="agregar_usuario"><i class='bx bx-plus-circle'></i>Agregar usuario</button>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Usuario</th>
                                                    <th>Tipo</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php foreach ($usuarios as $u) { ?>
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $u->nombre . " " . $u->apellido_paterno . " " . $u->apellido_materno; ?></strong></td>
                                                        <td><?= $u->usuario; ?></td>

                                                        <td><span class="badge bg-label-primary me-1"><?= $u->rol; ?></span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                    Config.<i class='bx bxs-cog'></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Ver detalle</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Eliminar</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!--/ Basic Bootstrap Table -->
                        <hr class="my-5" />
                        <!--/ Responsive Table -->
                    </div>
                    <!-- / Content -->

                    <?= $footer; ?>

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <?= $js; ?>
    <script>
        $(document).ready(function() {
            $('#agregar_usuario').click(function() {
                const roles = JSON.parse($('#rolesData').attr('data-roles'));
                // Generamos las opciones del select dinámicamente
                let rolesOptions = '<option value="">Seleccione un rol</option>';
                roles.forEach(rol => {
                    rolesOptions += `<option value="${rol.id}">${rol.rol}</option>`;
                });

                $.confirm({
                    title: 'Agregar Usuario',
                    theme: 'material', // 'material', 'bootstrap'
                    type: 'blue',
                    closeIcon: true,
                    columnClass: 'col-md-6 col-md-offset-3',
                    content: `
                        <form id="userForm" novalidate>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-4">
                                    <label for="nombre" class="form-label">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control form-control-sm" required>
                                    <div class="invalid-feedback">El nombre es obligatorio.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="apellido_paterno" class="form-label">Apellido Paterno:</label>
                                    <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control form-control-sm" required>
                                    <div class="invalid-feedback">El apellido paterno es obligatorio.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="apellido_materno" class="form-label">Apellido Materno:</label>
                                    <input type="text" id="apellido_materno" name="apellido_materno" class="form-control form-control-sm" required>
                                    <div class="invalid-feedback">El apellido materno es obligatorio.</div>
                                </div>
                            </div>
                                
                            <div class="row mb-3"> 
                                <div class="col-md-6">
                                    <label for="usuario" class="form-label">Usuario:</label>
                                    <input type="text" id="usuario" name="usuario" class="form-control form-control-sm" required>
                                    <div class="invalid-feedback">El usuario es obligatorio.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Contraseña:</label>
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="password"
                                            id="password"
                                            class="form-control form-control-sm"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            required
                                            aria-describedby="password"
                                            autocomplete="new-password"
                                            aria-autocomplete="list">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide" id="toggle-password"></i></span>
                                        <div class="invalid-feedback">La contraseña es obligatoria.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-4">      
                                    <label for="correo" class="form-label">Correo:</label>
                                    <input type="email" id="correo" name="correo" class="form-control form-control-sm" required>
                                    <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>                              
                                </div>


                                <div class="col-md-4">
                                    <label for="celular" class="form-label">Celular:</label>
                                    <input type="text" id="celular" name="celular" class="form-control form-control-sm" required>
                                    <div class="invalid-feedback">El celular es obligatorio.</div>                                 
                                </div>


                                <div class="col-md-4">
                                    <label for="rol" class="form-label">Rol:</label>
                                    <select id="rol" name="rol" class="form-control form-control-sm" required>
                                        ${rolesOptions}
                                    </select>
                                    <div class="invalid-feedback">Seleccione un rol válido.</div>
                                </div>
                            </div>
                        </form>
                    `,
                    buttons: {
                        guardar: {
                            text: 'Guardar',
                            btnClass: 'btn-blue',
                            action: function() {
                                const btn = this.buttons.guardar;
                                if (btn) {
                                    btn.disable(); // Esto deshabilita el botón si está definido
                                }
                                let isValid = true;

                                // Validar campos
                                $('#userForm input, #userForm select').each(function() {
                                    const $input = $(this);
                                    const value = $input.val().trim();

                                    if ($input.attr('type') === 'email') {
                                        // Validación específica para el correo
                                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                        if (!emailRegex.test(value)) {
                                            $input.addClass('is-invalid').removeClass('is-valid');
                                            isValid = false;
                                        } else {
                                            $input.addClass('is-valid').removeClass('is-invalid');
                                        }
                                    } else if (value === '') {
                                        // Validación para campos vacíos
                                        $input.addClass('is-invalid').removeClass('is-valid');
                                        isValid = false;
                                    } else {
                                        $input.addClass('is-valid').removeClass('is-invalid');
                                    }
                                });

                                if (!isValid) {
                                    return false; // Detiene la ejecución si hay errores
                                }

                                // Recopila los datos del formulario
                                const formData = {
                                    nombre: $('#nombre').val(),
                                    apellido_paterno: $('#apellido_paterno').val(),
                                    apellido_materno: $('#apellido_materno').val(),
                                    usuario: $('#usuario').val(),
                                    correo: $('#correo').val(),
                                    celular: $('#celular').val(),
                                    password: $('#password').val(),
                                    rol: $('#rol').val()
                                };
                                //this.buttons.guardar.setText('Guardando...').disable();

                                $.ajax({
                                    url: 'guardar',
                                    type: 'POST',
                                    data: formData,
                                    dataType: 'json',
                                    success: function(response) {
                                        if (response.success) {
                                            confirmInstance.close(); // Cierra el diálogo solo si tiene éxito
                                            $.alert('Usuario agregado correctamente.');
                                        } else {
                                            $.alert('Hubo un error al registrar los datos.');
                                        }
                                    },
                                    error: function() {
                                        $.alert('Error en la comunicación con el servidor.');
                                    },
                                    complete: function() {
                                        // Reactivar el botón en cualquier caso
                                        confirmInstance.buttons.guardar.setText('Guardar').enable();
                                    }
                                });
                                return false; // Evita cerrar el diálogo hasta completar el AJAX

                            }
                        },
                        cancelar: function() {
                            $.alert('Acción cancelada.');
                        }
                    },
                    onContentReady: function() {
                        // Reinicia las clases de validación al abrir el formulario
                        $('#userForm input, #userForm select').removeClass('is-valid is-invalid');

                        $('#usuario').on('blur', function() {
                            const usuario = $(this).val().trim();

                            if (usuario === '') {
                                $(this).addClass('is-invalid').removeClass('is-valid');
                                $('#usuario-feedback').text('El usuario es obligatorio.');
                                return;
                            }

                            // Petición AJAX para verificar el usuario
                            $.ajax({
                                url: '/api/verificar-usuario', // Cambia esto a la URL correcta de tu servidor
                                method: 'POST',
                                data: {
                                    usuario
                                },
                                success: function(response) {
                                    if (response.existe) {
                                        $('#usuario').addClass('is-invalid').removeClass('is-valid');
                                        $('#usuario-feedback').text('El usuario ya existe.');
                                    } else {
                                        $('#usuario').addClass('is-valid').removeClass('is-invalid');
                                    }
                                },
                                error: function() {
                                    $('#usuario').addClass('is-invalid').removeClass('is-valid');
                                    $('#usuario-feedback').text('Ocurrió un error al verificar el usuario.');
                                }
                            });
                        });
                    }
                });

            });
            // Función para mostrar/ocultar contraseña
            $(document).on('click', '#toggle-password', function() {
                const passwordInput = $('#password');
                const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
                passwordInput.attr('type', type);
                $(this).toggleClass('bx-hide bx-show');
            });
        });
    </script>
</body>

</html>