<main class="dashboard__color">

    <?php include_once __DIR__ . '/../dashboard/header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>

    <div class="dashboard__compras">

        <?php foreach($cursos as $curso) { ?>
            <div class="tarjeta">
                <div class="tarjeta__face tarjeta__front">
                    <picture>
                        <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.webp'?>" type="image/webp">
                        <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" type="image/png">
                        <img class="tarjeta__face" src="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" alt="Imagen curso">
                    </picture>
                    <div class="tarjeta__contenido">
                        <h3 class="tarjeta__nombre"><?php echo $curso->nombre ?></h3>
                        <p class="tarjeta__texto"><?php echo $curso->duracion ?></p>
                    </div>
                </div>

                <div class="tarjeta__face tarjeta__back">
                    <div class="tarjeta__face tarjeta__contenido tarjeta__bg"></div>
                    <p class="tarjeta__descripcion"><?php if(strlen($curso->descripcion) < 1000) {
                        echo $curso->descripcion;
                    } else {
                        echo substr($curso->descripcion, 0, 1000) . "...";
                    } ?></p>
                    <a class="table__carrito" href="/cursos/learn/dashboard?id=<?php echo $curso->id ?>">
                        <div class="table__accion--carrito" type="submit">
                            Entrar al curso
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </div>
                    </a>   
                </div>
            </div>
        <?php } ?> 
        
        
        
    </div>

    <?php if(!$cursos) { ?>
        <p class="carrito__descripcion--nombre carrito__descripcion--centrar">No hay Ningun Curso Adquirido por el Momento</p>
    <?php } ?>
    
    
</main>