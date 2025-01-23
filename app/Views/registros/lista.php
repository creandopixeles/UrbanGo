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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Registros /</span> Lista</h4>

                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <div class="container">
                                <div class="row justify-content-end align-items-center mt-3">
                                    <div class="col-md-12">
                                        <table class="table table-sm" id="tabla_beneficiarios">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Fecha de nacimiento</th>
                                                    <th>Correo</th>
                                                    <th>Tipo</th>
                                                    <th>Estatus</th>
                                                    <th>Fecha de registro</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php foreach ($registros as $r) { ?>
                                                    <tr>
                                                        <td><a href="detalle/<?= $r->id; ?>"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $r->nombre . " " . $r->apellido_paterno . " " . $r->apellido_materno; ?></strong></a></td>
                                                        <td><?= $r->fecha_nacimiento; ?></td>

                                                        <td><?= $r->correo; ?></td>
                                                        <td><span class="badge <?= $r->class_tipo; ?> me-1"><?= $r->tipo_beneficiario; ?></span></td>
                                                        <td><span class="badge <?= $r->class_estatus; ?> me-1"><?= $r->estatus; ?></span></td>
                                                        <td><?= $r->created_at; ?></td>

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
            $('#tabla_beneficiarios').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json'

                }
            });
        });
    </script>
</body>

</html>