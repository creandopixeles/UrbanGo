<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="<?= base_url('public/assets/"
    data-template="vertical-menu-template-free') ?>">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('public/assets/img/favicon/favicon.ico') ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/fonts/boxicons.css') ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('public/assets/css/demo.css') ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/css/pages/page-auth.css') ?>" />
    <!-- Helpers -->
    <script src="<?= base_url('public/assets/vendor/js/helpers.js') ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('public/assets/js/config.js') ?>"></script>
</head>
<style>
    .authentication-wrapper.authentication-basic .authentication-inner {
        max-width: 500px;
        position: relative;
    }

    .authentication-wrapper.authentication-basic .authentication-inner .card .app-brand {
        margin-bottom: 1rem;
    }
</style>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">

                                <span class="app-brand-text demo text-body fw-bolder"><img src="<?= base_url('public/assets/img/sistema/urbango.png') ?>" width="190px"></span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <div class="row">
                            <div class="col-md-12 text-center">

                                <h4 class="mb-2">Crea una cuenta</h4>
                                <p class="mb-4">Es rapido y facil</p>

                            </div>


                            <form id="registroForm" novalidate>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                                        <div class="valid-feedback">¡Se ve bien!</div>
                                        <div class="invalid-feedback">Por favor, ingresa tu nombre.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                                        <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control" required>
                                        <div class="valid-feedback">¡Se ve bien!</div>
                                        <div class="invalid-feedback">Por favor, ingresa tu apellido paterno.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                                        <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="form-control" required>
                                        <div class="valid-feedback">¡Se ve bien!</div>
                                        <div class="invalid-feedback">Por favor, ingresa tu apellido materno.</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="form-label">Fecha de Nacimiento</label>
                                    <div class="col-md-4">
                                        <select id="anio" name="anio" class="form-select" required>
                                            <option value="">Año</option>
                                        </select>
                                        <div class="valid-feedback">¡Se ve bien!</div>
                                        <div class="invalid-feedback">Por favor, selecciona un año válido.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="mes" name="mes" class="form-select" required>
                                            <option value="">Mes</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                        <div class="valid-feedback">¡Se ve bien!</div>
                                        <div class="invalid-feedback">Por favor, selecciona un mes válido.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="dia" name="dia" class="form-select" required>
                                            <option value="">Día</option>
                                        </select>
                                        <div class="valid-feedback">¡Se ve bien!</div>
                                        <div class="invalid-feedback">Por favor, selecciona un día válido.</div>
                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label for="documento" class="form-label">Tipo de beneficiario</label>
                                        <select id="tipo_id" name="tipo_id" class="form-select" required>
                                            <option value="">Seleccione una opción</option>
                                            <?php foreach ($tipo  as $t) { ?>
                                                <option value="<?php echo $t->id; ?>"><?= $t->tipo; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="valid-feedback">¡Se ve bien!</div>
                                        <div class="invalid-feedback">Por favor, selecciona un mes válido.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sexo" class="form-label">Sexo</label>
                                        <select id="sexo" name="sexo" class="form-select" required>
                                            <option value="">Seleccione una opción</option>
                                            <option value="Maculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>

                                        </select>
                                        <div class="valid-feedback">¡Se ve bien!</div>
                                        <div class="invalid-feedback">Por favor, selecciona un mes válido.</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="documento" class="form-label">Documento de validación</label>
                                    <input type="file" id="documento" name="documento" class="form-control" required>
                                    <div class="valid-feedback">¡Se ve bien!</div>
                                    <div class="invalid-feedback">Por favor, selecciona un archivo.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" id="correo" name="correo" class="form-control" required>
                                    <div class="valid-feedback">¡Se ve bien!</div>
                                    <div class="invalid-feedback">Por favor, ingresa un correo válido.</div>
                                </div>

                                <div class="mb-3  form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="password"
                                            id="password"
                                            class="form-control"
                                            name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password"
                                            autocomplete="new-password"
                                            aria-autocomplete="list" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    <div class="valid-feedback">¡Se ve bien!</div>
                                    <div class="invalid-feedback">Por favor, ingresa una contraseña.</div>
                                </div>
                                <button class="btn btn-primary d-grid w-100">Registrarme</button>
                            </form>



                            <p class="text-center">
                                <span>¿Ya tienes una cuenta?</span>
                                <a href="auth-login-basic.html">
                                    <span><b>Inicia Sesión</b></span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- Register Card -->
                </div>
            </div>
        </div>

        <!-- / Content -->



        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script src="<?= base_url('public/assets/vendor/libs/jquery/jquery.js') ?>"></script>
        <script src="<?= base_url('public/assets/vendor/libs/popper/popper.js') ?>"></script>
        <script src="<?= base_url('public/assets/vendor/js/bootstrap.js') ?>"></script>
        <script src="<?= base_url('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>

        <script src="<?= base_url('public/assets/vendor/js/menu.js') ?>"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->

        <!-- Main JS -->
        <script src="<?= base_url('public/assets/js/main.js') ?>"></script>

        <!-- Page JS -->

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script>
            $(document).ready(function() {



                // Validar correo dinámicamente (keypress y blur)
                $('#correo').on('blur', function() {
                    const correo = $(this).val();
                    var correoInput = $('#correo'); // Asumiendo que el ID de tu input de correo es 'correo'

                    // Validar formato básico del correo antes de la llamada AJAX
                    const correoValido = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(correo);
                    if (!correoValido) {
                        $(this).addClass('is-invalid').removeClass('is-valid');
                        $(this).next('.invalid-feedback').text('Por favor, ingresa un correo válido.');
                        return;
                    }

                    // Realizar la llamada AJAX para verificar si el correo ya existe
                    $.ajax({
                        url: 'beneficiario/check-email', // Cambia esto por tu URL de validación
                        type: 'POST',
                        data: {
                            correo: correo
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Suponiendo que la respuesta tiene { exists: true/false }
                            if (response.exists) {
                                correoInput.addClass('is-invalid').removeClass('is-valid');
                                correoInput.next('.invalid-feedback').text('Este correo ya está registrado.');
                            } else {
                                correoInput.addClass('is-valid').removeClass('is-invalid');
                            }
                        },
                        error: function() {
                            correoInput.addClass('is-invalid').removeClass('is-valid');
                            correoInput.next('.invalid-feedback').text('Error al verificar el correo. Inténtalo de nuevo.');
                        }
                    });
                });

                // Validar otros campos con is-valid e is-invalid
                $('input, select').on('blur', function() {
                    if (this.checkValidity()) {
                        $(this).addClass('is-valid').removeClass('is-invalid');
                    } else {
                        $(this).addClass('is-invalid').removeClass('is-valid');
                    }
                });



                // Llenar los selects de días y años
                function populateDays(days = 31) {
                    $('#dia').empty().append('<option value="">Día</option>');
                    for (let i = 1; i <= days; i++) {
                        $('#dia').append(`<option value="${i}">${i}</option>`);
                    }
                }

                function populateYears() {
                    const currentYear = new Date().getFullYear();
                    for (let i = currentYear; i >= 1900; i--) {
                        $('#anio').append(`<option value="${i}">${i}</option>`);
                    }
                }

                populateDays(); // Inicialmente mostrar 31 días
                populateYears();

                // Actualizar días según el mes y año
                $('#mes, #anio').on('change', function() {
                    const month = $('#mes').val();
                    const year = $('#anio').val();
                    if (month) {
                        const daysInMonth = new Date(year || 2024, month, 0).getDate();
                        populateDays(daysInMonth);
                    }
                });

                // Validar contraseña dinámicamente
                $('#password').on('keypress blur', function() {
                    const value = $(this).val();
                    if (value.length >= 8) {
                        $(this).addClass('is-valid').removeClass('is-invalid');
                    } else {
                        $(this).addClass('is-invalid').removeClass('is-valid');
                    }
                });

                // Validar otros campos con is-valid y is-invalid
                $('input, select').on('blur', function() {
                    if (this.checkValidity()) {
                        $(this).addClass('is-valid').removeClass('is-invalid');
                    } else {
                        $(this).addClass('is-invalid').removeClass('is-valid');
                    }
                });

                $('#registroForm').submit(function(e) {
                    e.preventDefault(); // Prevenir el envío del formulario por defecto

                    let isValid = true;

                    // Validar cada campo
                    $('#registroForm input, #registroForm select').each(function() {
                        if (!this.checkValidity()) {
                            isValid = false;
                            $(this).addClass('is-invalid').removeClass('is-valid');
                        } else {
                            $(this).addClass('is-valid').removeClass('is-invalid');
                        }
                    });

                    // Crear un objeto FormData para manejar datos del formulario, incluyendo archivos
                    var formData = new FormData(this);

                    // Enviar los datos al controlador mediante AJAX
                    $.ajax({
                        url: 'registro/guardar', // Ruta al controlador que manejará el registro
                        type: 'POST',
                        data: formData,
                        contentType: false, // Esto es importante para el envío de archivos
                        processData: false, // Esto también es necesario para los archivos
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                // Si el registro fue exitoso, redirigir a la página de éxito
                                window.location = 'registro-exitoso'; // Ruta de la página de éxito
                            } else {
                                // Si hubo un error, mostrar un mensaje de error
                                alert('Hubo un error al registrar los datos.');
                            }
                        },
                        error: function() {
                            console.log('Error en la comunicación con el servidor.');
                        }
                    });
                });

            });
        </script>
</body>

</html>