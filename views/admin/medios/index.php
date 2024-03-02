<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor-boton">
    <a class="admin__boton" href="/admin/medios/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Video de Youtube
    </a>
    <a class="admin__boton" href="/admin/medios/crear-video">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Video
    </a>
</div>

<div class="admin__contenedor">
    <?php if(!empty($medios)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Videos</th>
                    <th class="table__th table__th--ponentes" scope="col">Video</th>
                    <th class="table__th table__th--acciones" scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($medios as $medio) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <div class="formulario-admin__video">
                                <?php if(strlen(trim($medio->url)) === 32) { ?>
                                    <video class="formulario-admin__video--block" src="<?php echo '/build/videos/' . trim($medio->url) . '.mp4'?>" controls></video>
                                <?php } else { ?>
                                    <iframe src="https://www.youtube.com/embed/<?php echo trim($medio->url) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                <?php } ?>
                            </div>
                        </td>

                        <td class="table__td--acciones">
                            <?php if(strlen(trim($medio->url)) === 32) { ?>
                                <a class="table__accion--editar" href="/admin/medios/editar-video?id=<?php echo $medio->id ?>">
                                    <i class="fa-solid fa-user-pen"></i>
                                    Editar
                                </a>
                            <?php } else { ?>
                                <a class="table__accion--editar" href="/admin/medios/editar?id=<?php echo $medio->id ?>">
                                    <i class="fa-solid fa-user-pen"></i>
                                    Editar
                                </a>
                            <?php } ?>

                            <form class="table__formulario" action="/admin/medios/eliminar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $medio->id ?>">
                                <button class="table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>    
        <p class="text-center">No hay medios Aún</p>
    <?php } ?>    
</div>

<?php
    echo $paginacion;
?>