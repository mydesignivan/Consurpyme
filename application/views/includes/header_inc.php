    <div class="span-22 icon-menu">
        <a href="<?=site_url('/empresa/');?>"><img src="images/icon_home.png" alt="Inicio"/></a>
        <a href="<?=site_url('/contacto/');?>"><img src="images/icon_contact.png" alt="Contacto"/></a>
    </div>

    <div class="clear span-22 prepend-1 append-1 last header">
        <div class="span-22 menu">
            <ul>
                <li><a href="<?=site_url('/empresa/');?>" <?php if( $this->uri->segment(1)=="index" || $this->uri->segment(1)=="" ) echo 'class="current"';?>>Empresa</a></li>
                <li><a href="<?=site_url('/iso/');?>" <?php if( $this->uri->segment(1)=="iso" ) echo 'class="current"';?>>Iso 9001</a></li>
                <li><a href="<?=site_url('/servicios/');?>" <?php if( $this->uri->segment(1)=="servicios" ) echo 'class="current"';?>>Servicios</a></li>
                <li><a href="<?=site_url('/clientes/');?>" <?php if( $this->uri->segment(1)=="clientes" ) echo 'class="current"';?>>Clientes</a></li>
                <li><a href="<?=site_url('/proyectos/');?>" <?php if( $this->uri->segment(1)=="proyectos" ) echo 'class="current"';?>>Proyectos</a></li>
                <li><a href="<?=site_url('/galeria/');?>" <?php if( $this->uri->segment(1)=="galeria" ) echo 'class="current"';?>>Galer&iacute;a</a></li>
            </ul>
        </div>

        <div class="clear span-22 last">
            <div class="span-10 prepend-1 logo">
                <a href="<?=site_url('/empresa/');?>"><img src="images/logo_consurpyme.png" alt="Consurpyme Obras y Servicios de Ingeniería"/></a>
            </div>
            <div class="span-10 last flash"></div>
        </div>
    </div>