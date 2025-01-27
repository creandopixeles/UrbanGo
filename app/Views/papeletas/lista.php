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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Papeletas /</span> Lista</h4>

                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <div class="container">
                                <div class="row justify-content-end align-items-center mt-3">
                                    <div class="col-md-12">
                                        <table class="table table-sm" id="tabla_beneficiarios">
                                            <thead>
                                                <tr>
                                                    <th>No. de Papeleta</th>
                                                    <th>Fecha de salida</th>
                                                    <th>Unidad</th>
                                                    <th>Anden</th>
                                                    <th>Origen</th>
                                                    <th>Deestino</th>
                                                    <th>Chofer</th>
                                                    <th>Color</th>
                                                    <th>Status</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php foreach ($papeletas as $p) { ?>
                                                    <tr>
                                                        <th><?= $p->no_papeleta; ?></th>
                                                        <th><?= $p->fecha . ' / ' . $p->hora; ?></th>
                                                        <th><?= 'Unidad ' . $p->no_unidad; ?></th>
                                                        <th><?= $p->anden; ?></th>
                                                        <th><?= $p->lugar_origen; ?></th>
                                                        <th><?= $p->lugar_destino; ?></th>
                                                        <th><?= $p->nombre . ' ' . $p->apellido_paterno . ' ' . $p->apellido_materno; ?></th>
                                                        <th><?= $p->color; ?></th>
                                                        <th><?= $p->info_status; ?></th>

                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                    Config.<i class='bx bxs-cog'></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="impresion/<?= $p->id; ?>"><i class='bx bx-qr'></i> Impresión</a>
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
            $('#tabla_beneficiarios').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json'

                }
            });
        });
    </script>
</body>

</html>