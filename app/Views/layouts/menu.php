 <!-- Menu -->

 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <a href="index.html" class="app-brand-link">
             <span class="app-brand-text demo menu-text fw-bolder ms-2"><img src="<?= base_url('public/assets/img/sistema/urbango.png') ?>" width="190px"></span>
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
         <!-- Dashboard -->
         <li class="menu-item">
             <a href="<?= base_url('dahsboard') ?>" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div data-i18n="Analytics">Dashboard</div>
             </a>
         </li>

         <!-- Layouts -->

         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Administración</span>
         </li>
         <li class="menu-item" style="">
             <a href="javascript:void(0)" class="menu-link menu-toggle">
                 <i class="menu-icon tf-icons bx bx-group"></i>
                 <div data-i18n="User interface">Usuarios</div>
             </a>
             <ul class="menu-sub">
                 <li class="menu-item">
                     <a href="<?= base_url('usuarios/lista') ?>" class="menu-link">
                         <div data-i18n="Accordion">Gestión de usuarios</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="<?= base_url('usuarios/administradores') ?>" class="menu-link">
                         <div data-i18n="Alerts">Administradores</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="<?= base_url('usuarios/concecionarios') ?>" class="menu-link">
                         <div data-i18n="Badges">Concecionarios</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="<?= base_url('usuarios/choferes') ?>" class="menu-link">
                         <div data-i18n="Buttons">Choferes</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="<?= base_url('usuarios/taquilleros') ?>" class="menu-link">
                         <div data-i18n="Carousel">Taquilleros</div>
                     </a>
                 </li>
             </ul>
         </li>
         <li class="menu-item">
             <a href="<?= base_url('unidades/lista') ?>" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-bus"></i>
                 <div data-i18n="Basic">Unidades</div>
             </a>
         </li>
         <li class="menu-item">
             <a href="<?= base_url('taquillas/lista') ?>" class="menu-link">
                 <i class="menu-icon tf-icons bx  bxs-store-alt"></i>
                 <div data-i18n="Basic">Taquillas</div>
             </a>
         </li>
         <li class="menu-item">
             <a href="<?= base_url('lugares/lista') ?>" class="menu-link">
                 <i class="menu-icon tf-icons bx bxs-map"></i>
                 <div data-i18n="Basic">Lugares</div>
             </a>
         </li>


         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Administracion de Bneficiarios</span>
         </li>
         <li class="menu-item">
             <a href="<?= base_url('registros/lista') ?>" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-paste"></i>
                 <div data-i18n="Basic">Registros</div>
             </a>
         </li>
         <li class="menu-item">
             <a href="<?= base_url('beneficiarios/lista') ?>" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-id-card"></i>
                 <div data-i18n="Basic">Beneficiarios</div>
             </a>
         </li>
         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Viajes</span>
         </li>
         <li class="menu-item">
             <a href="<?= base_url('viajes/lista') ?>" class="menu-link">
                 <i class="menu-icon tf-icons bx bxs-coupon"></i>
                 <div data-i18n="Basic">Viajes registrados </div>
             </a>
             <a href="<?= base_url('papeletas/lista') ?>" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-qr"></i>
                 <div data-i18n="Basic">Papeletas </div>
             </a>
         </li>



         <!-- Misc -->
         <li class="menu-header small text-uppercase"><span class="menu-header-text">Miscelanea</span></li>
         <li class="menu-item">
             <a
                 href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                 target="_blank"
                 class="menu-link">
                 <i class="menu-icon tf-icons bx bx-support"></i>
                 <div data-i18n="Support">Soporte</div>
             </a>
         </li>
         <li class="menu-item">
             <a
                 href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                 target="_blank"
                 class="menu-link">
                 <i class="menu-icon tf-icons bx bx-file"></i>
                 <div data-i18n="Documentation">Documentation</div>
             </a>
         </li>
     </ul>
 </aside>
 <!-- / Menu -->