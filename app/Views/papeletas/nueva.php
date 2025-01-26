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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Papeletas /</span> Nueva</h4>

                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <div class="container">
                                <div class="row justify-content-end align-items-center mt-3">
                                    <div class="mb-3" id="registro_papeleta">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="fecha" class="form-label">Fecha</label>
                                                <input type="date" class="form-control" id="fecha" value="<?= date('Y-m-d'); ?>" readonly required>
                                                <div class="invalid-feedback">La fecha es obligatoria.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="fecha" class="form-label">Hora</label>
                                                <input type="time" class="form-control" id="hora" value="" required>
                                                <div class="invalid-feedback">La fecha es obligatoria.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="no_papeleta" class="form-label">Número de papeleta</label>
                                                <input type="text" class="form-control" id="no_papeleta" required>
                                                <div class="invalid-feedback">El número de papeleta es obligatorio.</div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="unidad" class="form-label">Unidad</label>
                                                <select class="form-select" id="id_unidad" required>
                                                    <option value="">Selecciona una unidad</option>
                                                    <?php foreach ($unidades as $u) { ?>
                                                        <option value="<?= $u->id; ?>">Unidad <?= $u->no_unidad; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">La unidad es obligatoria.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="anden" class="form-label">Andén</label>
                                                <select class="form-select" id="id_anden" required>
                                                    <option value="">Selecciona un andén</option>
                                                    <?php foreach ($andenes as $a) { ?>
                                                        <option value="<?= $a->id; ?>">Unidad <?= $a->anden; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">El andén es obligatorio.</div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="origen" class="form-label">Origen</label>
                                                <select class="form-select" id="id_lugar_origen" required>
                                                    <option value="">Selecciona un origen</option>
                                                    <?php foreach ($lugares as $l) { ?>
                                                        <option value="<?= $l->id; ?>"><?= $l->lugar; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">El origen es obligatorio.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="destino" class="form-label">Destino</label>
                                                <select class="form-select" id="id_lugar_destino" required>
                                                    <option value="">Selecciona un destino</option>
                                                    <?php foreach ($lugares as $l) { ?>
                                                        <option value="<?= $l->id; ?>"><?= $l->lugar; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">El destino es obligatorio.</div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="chofer" class="form-label">Chofer</label>
                                                <select class="form-select" id="id_chofer" required>
                                                    <option value="">Selecciona un chofer</option>
                                                    <?php foreach ($usuarios as $u) { ?>
                                                        <option value="<?= $u->id; ?>"><?= $u->nombre . ' ' . $u->apellido_paterno . ' ' . $u->apellido_materno; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">El chofer es obligatorio.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="color" class="form-label">Color</label>
                                                <select class="form-select" id="color" required>
                                                    <option value="">Selecciona un color</option>
                                                    <option value="Rojo">Rojo</option>
                                                    <option value="Azul">Azul</option>
                                                    <option value="Verde">Verde</option>
                                                    <option value="Amarillo">Amarillo</option>
                                                    <option value="Morado">Morado</option>
                                                    <option value="Naranja">Naranja</option>
                                                    <option value="Gris">Gris</option>

                                                </select>
                                                <div class="invalid-feedback">El color es obligatorio.</div>
                                            </div>
                                        </div>
                                        <button id="generar" class="btn btn-primary">Generar</button>
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


            function validarSeleccion() {
                const origen = $("#id_lugar_origen").val();
                const destino = $("#id_lugar_destino").val();

                // Reset de clases y mensajes
                $("#id_lugar_origen, #id_lugar_destino").removeClass("is-valid is-invalid");
                $("#id_lugar_origen").next(".invalid-feedback").text("El origen es obligatorio.");
                $("#id_lugar_destino").next(".invalid-feedback").text("El destino es obligatorio.");

                if (origen === "" || destino === "") {
                    // Caso de error: Origen o destino vacíos
                    if (origen === "") {
                        $("#id_lugar_origen").addClass("is-invalid");
                    }
                    if (destino === "") {
                        $("#id_lugar_destino").addClass("is-invalid");
                    }
                } else if (origen === destino) {
                    // Caso de error: Origen y destino son iguales
                    $("#id_lugar_origen, #id_lugar_destino").addClass("is-invalid");
                    $("#id_lugar_origen").next(".invalid-feedback").text("El origen y destino no pueden ser iguales.");
                    $("#id_lugar_destino").next(".invalid-feedback").text("El origen y destino no pueden ser iguales.");
                } else {
                    // Caso válido: Valores diferentes y no vacíos
                    $("#id_lugar_origen, #id_lugar_destino").addClass("is-valid");
                }
            }

            // Agregar evento onblur a ambos selects
            $("#id_lugar_origen, #id_lugar_destino").on("blur", validarSeleccion);

            // Validar número de papeleta para permitir solo números
            $('#no_papeleta').on('input', function() {
                // Reemplazar cualquier caracter no numérico
                this.value = this.value.replace(/[^0-9]/g, '');
            });


            // Escuchar el evento blur en los campos del formulario
            $('.form-control, .form-select').on('blur', function() {
                // Elimina las clases de validación previas
                $(this).removeClass('is-valid is-invalid');

                // Validar si el campo está vacío
                if ($(this).val() === '' || $(this).val() === null) {
                    $(this).addClass('is-invalid'); // Campo inválido
                } else {
                    $(this).addClass('is-valid'); // Campo válido
                }
            });


            // Evento submit del formulario
            $('#generar').on('click', function() {
                let valid = true;

                // Validar todos los campos antes de enviar
                $('.form-control, .form-select').each(function() {
                    $(this).removeClass('is-valid is-invalid');
                    if ($(this).val() === '' || $(this).val() === null) {
                        $(this).addClass('is-invalid'); // Campo inválido
                        valid = false;
                    } else {
                        $(this).addClass('is-valid'); // Campo válido
                    }
                });

                // Si todos los campos son válidos, se envía el formulario vía AJAX
                if (valid) {
                    const formData = {
                        fecha: $('#fecha').val(),
                        no_papeleta: $('#no_papeleta').val(),
                        hora: $('#hora').val(),
                        id_unidad: $('#id_unidad').val(),
                        id_anden: $('#id_anden').val(),
                        id_lugar_origen: $('#id_lugar_origen').val(),
                        id_lugar_destino: $('#id_lugar_destino').val(),
                        id_chofer: $('#id_chofer').val(),
                        color: $('#color').val()
                    };

                    $.ajax({
                        url: 'guardar', // Cambiar por la ruta a tu controlador
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 'success') {
                                alert('Formulario enviado correctamente.');
                                $('#registro_papeleta').find('input, select').val('');
                                $('.form-control, .form-select').removeClass('is-valid is-invalid');
                            } else {
                                alert('Ocurrió un error al procesar la solicitud.');
                            }
                        },
                        error: function() {
                            alert('Error en la comunicación con el servidor.');
                        }
                    });
                } else {
                    alert('Por favor, completa todos los campos antes de enviar.');
                }
            });
        });
    </script>
</body>

</html>