<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__tipos--rol">
    
    <div class="tarjeta">
        <div class="tarjeta__face tarjeta__front">
            <picture>
                <source srcset="<?php echo '/build/img/bells.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/bells.png'?>" type="image/png">
                <img class="tarjeta__face" src="<?php echo '/build/img/bells.png'?>" alt="Imagen tipo">
            </picture>
            <div class="tarjeta__contenido">
                <h3 class="tarjeta__nombre"><i class="fa-solid fa-bell"></i> Alertas</h3>
            </div>
        </div>

        <div class="tarjeta__face tarjeta__back">
            <div style="height: 100%;" class="tarjeta__contenido tarjeta__centrar table__carrito">
                <a class="table__accion--seleccionar" href="/admin/cursos/learn/alerts?id=<?php echo $curso->id ?>">Acceder</a>
            </div>
        </div>
    </div>

    <div class="tarjeta">
        <div class="tarjeta__face tarjeta__front">
            <picture>
                <source srcset="<?php echo '/build/img/folders.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/folders.png'?>" type="image/png">
                <img class="tarjeta__face" src="<?php echo '/build/img/folders.png'?>" alt="Imagen tipo">
            </picture>
            <div class="tarjeta__contenido">
                <h3 class="tarjeta__nombre"><i class="fa-solid fa-folder-open"></i> Documentos</h3>
            </div>
        </div>

        <div class="tarjeta__face tarjeta__back">
            <div style="height: 100%;" class="tarjeta__contenido tarjeta__centrar table__carrito">
                <a class="table__accion--seleccionar" href="/admin/cursos/learn/docs?id=<?php echo $curso->id ?>">Acceder</a>
            </div>
        </div>
    </div>

    <div class="tarjeta">
        <div class="tarjeta__face tarjeta__front">
            <picture>
                <source srcset="<?php echo '/build/img/events.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/events.png'?>" type="image/png">
                <img class="tarjeta__face" src="<?php echo '/build/img/events.png'?>" alt="Imagen tipo">
            </picture>
            <div class="tarjeta__contenido">
                <h3 class="tarjeta__nombre"><i class="fa-solid fa-folder-open"></i> Eventos</h3>
            </div>
        </div>

        <div class="tarjeta__face tarjeta__back">
            <div style="height: 100%;" class="tarjeta__contenido tarjeta__centrar table__carrito">
                <a class="table__accion--seleccionar" href="/admin/cursos/learn/events?id=<?php echo $curso->id ?>">Acceder</a>
            </div>
        </div>
    </div>
    
</div>