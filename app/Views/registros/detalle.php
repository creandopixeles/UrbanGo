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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resgirso /</span> Detalle</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h5 class="card-header">Detalles del registro</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img
                                                src="../assets/img/avatars/1.png"
                                                alt="user-avatar"
                                                class="d-block rounded"
                                                height="100"
                                                width="100"
                                                id="uploadedAvatar" />
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Nombre</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="firstName"
                                                        name="firstName"
                                                        value="<?= $registro->nombre; ?>"
                                                        autofocus
                                                        readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Apellido</label>
                                                    <input class="form-control" type="text" name="lastName" id="lastName" value="<?= $registro->apellido_materno . ' ' . $registro->apellido_materno; ?>" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">Correo</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="email"
                                                        name="email"
                                                        value="john.doe@example.com"
                                                        placeholder="<?= $registro->correo; ?>" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="organization" class="form-label">Tipo de beneficio</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="organization"
                                                        name="organization"
                                                        value="<?= $registro->tipo_beneficiario; ?>"
                                                        readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Fecha de nacimiento</label>
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?= $registro->fecha_nacimiento; ?>" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="state" class="form-label">Sexo</label>
                                                    <input class="form-control" type="text" id="state" name="state" placeholder="California" value="<?= $registro->sexo; ?>" readonly />
                                                </div>
                                                <!-- Imagen alineada a la izquierda -->
                                                <div class="col-12 mb-3 text-center">
                                                    <img
                                                        src="<?= base_url("public/uploads/beneficiarios/$registro->id/$registro->documento"); ?>"
                                                        alt="Beneficiario"
                                                        alt="Foto del beneficiario"
                                                        class="img-thumbnail"
                                                        style="width: 150px; height: 150px; object-fit: cover; float: left; margin-right: 20px; cursor:pointer;">
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button class="btn btn-primary me-2" id="rechazarSolicitud" data-id="<?= $registro->id; ?>">Aprobar</button>
                                                <button class="btn btn-outline-danger" id="rechazarSolicitud" data-id="<?= $registro->id; ?>">Rechazar</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /Account -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- / Content -->


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
                $('#rechazarSolicitud').click(function() {
                    let id = $(this).attr("data-id");
                    $.confirm({
                        title: 'Confirmación',
                        content: `
                            <form>
                                <div class="form-group">
                                    <label for="motivo">Motivo del rechazo:</label>
                                    <textarea id="motivo" class="form-control" rows="4" maxlength="100"></textarea>
                                    <small id="charCount">100 caracteres restantes</small>
                                    <div id="errorMessage" style="color: red; display: none;">El motivo debe ser llenado.</div>
                                </div>
                            </form>
                        `,
                        buttons: {
                            deleteUser: {
                                text: 'Rechazar confirmación',
                                action: function() {
                                    var motivo = $('#motivo').val().trim();
                                    if (motivo.length === 0) {
                                        $('#errorMessage').show(); // Mostrar mensaje de error
                                        return false; // Evitar que se cierre el modal
                                    } else {
                                        $('#errorMessage').hide(); // Ocultar mensaje de error

                                        // Petición AJAX
                                        $.ajax({
                                            url: '../rechazar/' + id, // Suponiendo que 'id' es una variable global con el ID del registro
                                            method: 'POST',
                                            data: {
                                                motivo: motivo
                                            },
                                            success: function(response) {
                                                if (response.success) {
                                                    // Mostrar modal con respuesta exitosa
                                                    $.alert({
                                                        title: 'Respuesta',
                                                        content: response.message, // Suponiendo que la respuesta tenga un campo 'message'
                                                        type: 'green', // Tipo verde para éxito
                                                        autoClose: 'cancelAction|8000', // Cerrar automáticamente después de 8 segundos
                                                        buttons: {
                                                            cancelAction: {
                                                                text: 'Aceptar',
                                                                action: function() {
                                                                    // Redirigir a otra página al hacer clic en Aceptar
                                                                    window.location.href = '../lista'; // Reemplaza con la URL de redirección
                                                                }
                                                            }
                                                        }
                                                    });
                                                } else {
                                                    // En caso de que no sea exitoso, mostrar el mensaje de error
                                                    $.alert({
                                                        title: 'Error',
                                                        content: response.message, // Mostrar el mensaje de error
                                                        type: 'red' // Tipo rojo para error
                                                    });
                                                }
                                            },
                                            error: function() {
                                                $.alert('Hubo un error al procesar la solicitud.');
                                            }
                                        });


                                    }
                                }
                            },
                            cancelAction: function() {
                                $.alert('La acción ha sido cancelada');
                                this.close(); // Cerrar el modal si se cancela
                            }
                        },
                        onContentReady: function() {
                            var $motivo = this.$content.find('#motivo');
                            var $charCount = this.$content.find('#charCount');
                            var $errorMessage = this.$content.find('#errorMessage');

                            $motivo.on('input', function() {
                                var remaining = 100 - $(this).val().length;
                                $charCount.text(remaining + ' caracteres restantes');
                                if (remaining <= 0) {
                                    $motivo.val($motivo.val().substring(0, 100)); // Limita a 100 caracteres
                                }
                            });
                        }
                    });
                });

            });
        </script>
</body>

</html>