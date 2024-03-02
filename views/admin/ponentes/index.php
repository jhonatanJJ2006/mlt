<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor-boton">
    <a class="admin__boton" href="/admin/ponentes/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Ponente
    </a>
</div>

<div class="admin__contenedor">
    <?php if(!empty($ponentes)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Ponente</th>
                    <th class="table__th" scope="col">Imagen</th>
                    <th class="table__th" scope="col">Nombre</th>
                    <th class="table__th" scope="col">Habilidades</th>
                    <th class="table__th table__th--acciones" scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($ponentes as $ponente) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <div class="formulario-admin__imagen">
                                <picture>
                                    <source srcset="<?php echo '/build/img/speakers/' . $ponente->imagen . '.webp'?>" type="image/webp">
                                    <source srcset="<?php echo '/build/img/speakers/' . $ponente->imagen . '.png'?>" type="image/png">
                                    <img class="formulario-admin__imagen--table" src="<?php echo '/build/img/speakers/' . $ponente->imagen . '.png'?>" alt="Imagen Ponente">
                                </picture>
                            </div>
                        </td>

                        <td class="table__td">
                            <?php echo $ponente->nombre . " " . $ponente->apellido ?? '' ?>
                        </td>

                        <td class="table__td">
                            <?php
                                $tags = $ponente->tags;
                                $tags = explode(",", $tags);
                             ?>
                            <div class="formulario-admin__listado">

                                <?php foreach($tags as $tag) { ?>
                                    <li class="formulario__tag"><?php echo $tag ?></li>
                                <?php } ?>
                    
                            </div>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion--editar" href="/admin/ponentes/editar?id=<?php echo $ponente->id ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form class="table__formulario" action="/admin/ponentes/eliminar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $ponente->id ?>">
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
        <p class="text-center">No hay Ponentes Aún</p>
    <?php } ?>    
</div>

<?php
    echo $paginacion;
?>