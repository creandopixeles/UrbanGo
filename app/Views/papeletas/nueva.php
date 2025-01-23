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
                                    <form class="mb-3">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="fecha" class="form-label">Fecha</label>
                                                <input type="date" class="form-control" id="fecha" value="<?= date('Y-m-d'); ?>" readonly required>
                                                <div class="invalid-feedback">La fecha es obligatoria.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="numero_papeleta" class="form-label">Número de papeleta</label>
                                                <input type="text" class="form-control" id="numero_papeleta" required>
                                                <div class="invalid-feedback">El número de papeleta es obligatorio.</div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="unidad" class="form-label">Unidad</label>
                                                <select class="form-select" id="unidad" required>
                                                    <option value="">Selecciona una unidad</option>
                                                    <option value="Unidad 1">Unidad 1</option>
                                                    <option value="Unidad 2">Unidad 2</option>
                                                    <option value="Unidad 3">Unidad 3</option>
                                                </select>
                                                <div class="invalid-feedback">La unidad es obligatoria.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="anden" class="form-label">Andén</label>
                                                <select class="form-select" id="anden" required>
                                                    <option value="">Selecciona un andén</option>
                                                    <option value="Andén 1">Andén 1</option>
                                                    <option value="Andén 2">Andén 2</option>
                                                    <option value="Andén 3">Andén 3</option>
                                                </select>
                                                <div class="invalid-feedback">El andén es obligatorio.</div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="origen" class="form-label">Origen</label>
                                                <select class="form-select" id="origen" required>
                                                    <option value="">Selecciona un origen</option>
                                                    <option value="Origen 1">Origen 1</option>
                                                    <option value="Origen 2">Origen 2</option>
                                                    <option value="Origen 3">Origen 3</option>
                                                </select>
                                                <div class="invalid-feedback">El origen es obligatorio.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="destino" class="form-label">Destino</label>
                                                <select class="form-select" id="destino" required>
                                                    <option value="">Selecciona un destino</option>
                                                    <option value="Destino 1">Destino 1</option>
                                                    <option value="Destino 2">Destino 2</option>
                                                    <option value="Destino 3">Destino 3</option>
                                                </select>
                                                <div class="invalid-feedback">El destino es obligatorio.</div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="chofer" class="form-label">Chofer</label>
                                                <select class="form-select" id="chofer" required>
                                                    <option value="">Selecciona un chofer</option>
                                                    <option value="Chofer 1">Chofer 1</option>
                                                    <option value="Chofer 2">Chofer 2</option>
                                                    <option value="Chofer 3">Chofer 3</option>
                                                </select>
                                                <div class="invalid-feedback">El chofer es obligatorio.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="color" class="form-label">Color</label>
                                                <select class="form-select" id="color" required>
                                                    <option value="">Selecciona un color</option>
                                                    <option value="Color 1">Color 1</option>
                                                    <option value="Color 2">Color 2</option>
                                                    <option value="Color 3">Color 3</option>
                                                </select>
                                                <div class="invalid-feedback">El color es obligatorio.</div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </form>



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

            // Validar número de papeleta para permitir solo números
            $('#numero_papeleta').on('input', function() {
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
            $('form').on('submit', function(e) {
                e.preventDefault(); // Evitar envío estándar del formulario

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
                        numero_papeleta: $('#numero_papeleta').val(),
                        unidad: $('#unidad').val(),
                        anden: $('#anden').val(),
                        origen: $('#origen').val(),
                        destino: $('#destino').val(),
                        chofer: $('#chofer').val(),
                        color: $('#color').val()
                    };

                    $.ajax({
                        url: 'generar', // Cambiar por la ruta a tu controlador
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                alert('Formulario enviado correctamente.');
                                $('form')[0].reset(); // Reinicia el formulario
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