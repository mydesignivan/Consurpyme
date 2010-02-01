    <div class="span-22 icon-menu">
        <a href="<?=site_url('/index/');?>"><img src="images/icon_home.png" alt="Inicio"/></a>
        <a href="<?=site_url('/contacto/');?>"><img src="images/icon_contact.png" alt="Contacto"/></a>
    </div>

    <div class="clear span-22 prepend-1 append-1 last header">
        <div class="span-22 menu">
            <ul>
                <li><a href="<?=site_url('/panel/proyectos/');?>" <?php if( $this->uri->segment(2)=="proyectos" || $this->uri->segment(2)=="" || $this->uri->segment(2)=="proyectform" ) echo 'class="current"';?>>Proyectos</a></li>
                <li><a href="<?=site_url('/panel/galeria/');?>" <?php if( $this->uri->segment(2)=="galeria" || $this->uri->segment(2)=="galleryform" ) echo 'class="current"';?>>Galer&iacute;a</a></li>
                <li><a href="<?=site_url('/panel/micuenta/');?>" <?php if( $this->uri->segment(2)=="micuenta" ) echo 'class="current"';?>>Mi Cuenta</a></li>
                <li><a href="<?=site_url('/login/logout/');?>">Salir</a></li>
            </ul>
        </div>

        <div class="clear span-22 last">
            <div class="span-10 prepend-1 logo">
                <a href="<?=site_url('/index/');?>"><img src="images/logo_consurpyme.png" alt="Consurpyme Obras y Servicios de Ingeniería"/></a>
            </div>
            <div class="span-10 last flash"></div>
        </div>
    </div>