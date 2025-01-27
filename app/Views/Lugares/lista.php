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
                                                    <th>Lugar</th>
                                                    <th>Direccion</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php foreach ($lugares as $l) { ?>
                                                    <tr>
                                                    <td><?= $l->lugar;?></td>
                                                    <td><?= $l->direccion;?></td>
                                                    <td><?= $l->status;?></td>
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


                $.confirm({
                    title: 'Agregar Usuario',
                    theme: 'material', // 'material', 'bootstrap'
                    type: 'blue',
                    closeIcon: true,
                    columnClass: 'col-md-4 col-md-offset-4',
                    content: `
                        <form id="unidadForm" novalidate>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-12">
                                    <label for="lugar" class="form-label">Lugar:</label>
                                    <input type="text" id="lugar" name="lugar" class="form-control form-control-sm" required>
                                    <div class="invalid-feedback">El lugar es obligatorio.</div>
                                </div>
                                <div class="col-md-12">
                                    <label for="direccion" class="form-label">Direccion:</label>
                                    <input type="text" id="direccion" name="direccion" class="form-control form-control-sm" required>
                                    <div class="invalid-feedback">La direccion es obligatoria.</div>
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
                                $('#unidadForm input').each(function() {
                                    const $input = $(this);
                                    const value = $input.val().trim();

                                    if (value === '') {
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
                                    lugar: $('#lugar').val(),
                                    direccion: $('#direccion').val(),
                                };
                                //this.buttons.guardar.setText('Guardando...').disable();

                                $.ajax({
                                    url: 'guardar',
                                    type: 'POST',
                                    data: formData,
                                    dataType: 'json',
                                    success: function(response) {
                                        if (response.status === 'success') {
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
                                    if (response.status == 'success') {
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