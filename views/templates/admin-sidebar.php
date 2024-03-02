<aside class="admin__sidebar">
    <nav class="admin__menu">
        <a class="admin__enlace <?php echo pagina_actual('/admin/dashboard') ? 'admin__enlace--actual' : '' ?>" href="/admin/dashboard">
            <i class="admin__icono fa-solid fa-house"></i>
            <span class="admin__menu-texto">Inicio</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/admin/ponentes') ? 'admin__enlace--actual' : '' ?>" href="/admin/ponentes">
            <i class="admin__icono fa-solid fa-microphone"></i>
            <span class="admin__menu-texto">Ponentes</span>
        </a>
        
        <a class="admin__enlace <?php echo pagina_actual('/admin/cursos') ? 'admin__enlace--actual' : '' ?>" href="/admin/cursos">
            <i class="admin__icono fa-solid fa-graduation-cap"></i>
            <span class="admin__menu-texto">Cursos</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/admin/usuarios') ? 'admin__enlace--actual' : '' ?>" href="/admin/usuarios">
            <i class="admin__icono fa-solid fa-users"></i>
            <span class="admin__menu-texto">Usuarios</span>
        </a>
        
        <a class="admin__enlace <?php echo pagina_actual('/admin/medios') ? 'admin__enlace--actual' : '' ?>" href="/admin/medios">
            <i class="admin__icono fa-solid fa-photo-film"></i>
            <span class="admin__menu-texto">Medios</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/admin/revista') ? 'admin__enlace--actual' : '' ?>" href="/admin/revista">
            <i class="fa-solid fa-book-open"></i>
            <span class="admin__menu-texto">Revista</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/admin/articulos') ? 'admin__enlace--actual' : '' ?>" href="/admin/articulos">
            <i class="admin__icono fa-solid fa-newspaper"></i>
            <span class="admin__menu-texto">Articulos</span>
        </a>
    </nav>
</aside>