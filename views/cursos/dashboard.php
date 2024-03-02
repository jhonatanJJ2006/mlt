<main class="dashboard__color">

    <?php

 include_once __DIR__ . '/../dashboard/header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>
    
    <div class="dashboard__nosotros">

        <div class="dashboard__nosotros--cursos">

            <div class="dashboard__nosotros--info">

                <picture>
                    <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.webp'?>" type="image/webp">
                    <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" type="image/png">
                    <img class="dashboard__contenido-info" src="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" alt="Imagen Curso">
                </picture>

                <div class="dashboard__contenido-imagen tarjeta__contenido">
                    <h3 class="tarjeta__nombre"><?php echo $curso->duracion ?></h3>
                    <a class="tarjeta__texto" href="/ponente-informacion?id=<?php echo $ponente->id ?>"><?php echo $ponente->nombre ?></a>
                </div>

            </div>

        </div>


        <div class="admin__formulario--contacto admin__scroll">

            <div class="dashboard__nosotros--block">

                <div class="dashboard__cursos--barra">
                    <button class="dashboard__p--learn dashboard__p--learn-activo" data-target="home"><i class="fa-solid fa-house"></i> Home</button>
                    <button class="dashboard__p--learn" data-target="alertas"><i class="fa-solid fa-bell"></i> Comunicados</button>
                    <button class="dashboard__p--learn" data-target="documentos"><i class="fa-solid fa-folder-open"></i> Documentos</button>
                    <button class="dashboard__p--learn" data-target="progreso"><i class="fa-solid fa-spinner"></i></i> Progreso</button>
                </div>

                <div id="home" class="dashboard__cursos--item">
                    <p style="color: #ffff; font-size: 1.4rem;"><?php echo $curso->descripcion ?></p>

                    <h3 class="dashboard__h2">Eventos</h3>

                    <?php if(empty($eventos)) { ?>

                        <p style="color: #ffff; font-size: 1.4rem; text-align: center;">No hay Eventos de este Curso por el Momento</p>

                    <?php } else { ?>
                        
                        <table class="table">
                            <thead class="table__thead--eventos">
                                <tr>
                                    <th class="table__th-display" scope="col">Eventos</th>
                                    <th style="text-align: left;" class="table__th table__th--ponentes" scope="col">Nombre</th>
                                    <th style="text-align: left;" class="table__th table__th--ponentes" scope="col">Url</th>
                                    <th style="text-align: left;" class="table__th table__th--ponentes" scope="col">Fecha</th>
                                </tr>
                            </thead>

                            <tbody class="table__tbody">
                                <?php foreach($eventos as $evento) { ?>
                                    <tr class="table__tr--eventos">

                                        <td class="table__td">
                                            <div class="table__td--eventos">
                                                <p><i class="fa-solid fa-caret-right"></i></p>
                                                <p><?php echo $evento->nombre ?></p>
                                            </div>
                                        </td>

                                        <td class="table__td--blanco">
                                            <a class="table__td--eventos-enlace" href="<?php echo $evento->url ?>">Ingresar</a>
                                        </td>

                                        <td class="table__td--blanco">
                                            <p><?php echo $evento->fecha ?></p>
                                            <p><?php echo $evento->hora ?></p>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    <?php } ?>


                </div>

                <?php if(empty($alertas)) { ?>
                    <div id="alertas" class="dashboard__cursos--item" style="display: none;"><p class="dashboard__p">No hay Comunicados de este Curso por el Momento</p></div>

                <?php } else { ?>

                    <div id="alertas" class="dashboard__cursos--item" style="display: none;">

                        <?php foreach($alertas as $alerta) { ?>
                            <div class="dashboard__cursos--alertas">
                                <i class="fa-solid fa-caret-right"></i><p><?php echo $alerta->nombre ?></p>
                            </div>
                        <?php } ?>

                    </div>
                <?php } ?>

                <?php if(empty($documentos)) { ?>

                    <div id="documentos" class="dashboard__cursos--item" style="display: none;"><p class="dashboard__p">No hay Documentos de este Curso por el Momento</p></div>
                    
                <?php } else { ?>

                    <div id="documentos" class="dashboard__cursos--item" style="display: none;">

                        <table class="table">
                            <thead class="table__thead--eventos">
                                <tr>
                                    <th class="table__th-display" scope="col">Documentos</th>
                                    <th class="table__th table__th--ponentes" scope="col">Nombre</th>
                                    <th class="table__th table__th--ponentes" scope="col">Fecha</th>
                                    <th class="table__th table__th--ponentes" scope="col">Descargar</th>
                                </tr>
                            </thead>

                            <tbody class="table__tbody">

                                <?php foreach($documentos as $documento) { ?>

                                    <tr class="table__tr--eventos">

                                        <td class="table__td">
                                            
                                            <div class="table__td--eventos <?php
                                                $descargado = false;
                                                foreach($descargas as $descarga) {
                                                    if($descarga->documento_id === $documento->id) { 
                                                        $descargado = true;
                                                        break;
                                                    }
                                                }
                                                echo $descargado ? 'table__td--eventos-descargado' : '';
                                            ?>" style="text-align: left;">
                                                <p><?php echo $descargado ? '<i class="fa-solid fa-check"></i>' : '<i class="fa-solid fa-caret-right"></i>'; ?></p>
                                                <p><?php echo $documento->nombre ?></p>
                                            </div>
                                        </td>

                                        <td class="table__td--eventos" style="display: flex; text-align: center; padding: 1rem; justify-content: center;">
                                            <p><?php echo $documento->fecha ?></p> |
                                            <p><?php echo $documento->hora ?></p>
                                        </td>

                                        <td style="text-align: center;" class="table__td--blanco">

                                            <form style="display: flex; justify-content: center;" class="table__formulario" enctype="multipart/form-data" method="POST">

                                                <input type="hidden" name="documento" value="<?php echo $documento->id ?>">

                                                <button class="table__accion--seleccionar <?php echo $descargado ? 'clase1' : 'clase2' ?>" type="submit">
                                                    <i class="fa-solid fa-download"></i>
                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                    
                <?php } ?>

                <div id="progreso" class="dashboard__cursos--item" style="display: none;">
                    
                <div class="outer-container">
                    <div class="container">
                        <div class="progress-container">
                            <div class="progress-circle">
                                <svg viewBox="0 0 200 200" style="--progress: <?php echo $progreso ?>; --total: 100;">
                                    <circle cx="100" cy="100" r="90"></circle>
                                    <circle cx="100" cy="100" r="90" class="progress"></circle>
                                </svg>
                                <div class="progress-text"><?php echo number_format($progreso, 2) ?>%</div>
                            </div>
                        </div>
                    </div>
                </div>


                </div>


            </div>

        </div>

    </div>
    
</main>