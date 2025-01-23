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
             <a href="index.html" class="menu-link">
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
                 <i class="menu-icon tf-icons bx bx-box"></i>
                 <div data-i18n="User interface">Usuarios</div>
             </a>
             <ul class="menu-sub">
                 <li class="menu-item">
                     <a href="ui-accordion.html" class="menu-link">
                         <div data-i18n="Accordion">Gestión de usuarios</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="ui-alerts.html" class="menu-link">
                         <div data-i18n="Alerts">Administradores</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="ui-badges.html" class="menu-link">
                         <div data-i18n="Badges">Concecionarios</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="ui-buttons.html" class="menu-link">
                         <div data-i18n="Buttons">Choferes</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="ui-carousel.html" class="menu-link">
                         <div data-i18n="Carousel">Taquilleros</div>
                     </a>
                 </li>
             </ul>
         </li>
         <li class="menu-item">
             <a href="cards-basic.html" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-collection"></i>
                 <div data-i18n="Basic">Unidades</div>
             </a>
         </li>
         <li class="menu-item">
             <a href="cards-basic.html" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-collection"></i>
                 <div data-i18n="Basic">Taquillas</div>
             </a>
         </li>


         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Administracion de Bneficiarios</span>
         </li>
         <li class="menu-item">
             <a href="../registros/lista" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-collection"></i>
                 <div data-i18n="Basic">Registros</div>
             </a>
         </li>
         <li class="menu-item">
             <a href="cards-basic.html" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-collection"></i>
                 <div data-i18n="Basic">Beneficiarios</div>
             </a>
         </li>
         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Viajes</span>
         </li>
         <li class="menu-item">
             <a href="cards-basic.html" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-collection"></i>
                 <div data-i18n="Basic">Viajes registrados </div>
             </a>
             <a href="cards-basic.html" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-collection"></i>
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