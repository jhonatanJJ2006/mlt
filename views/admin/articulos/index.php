<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor-boton">
    <a class="admin__boton" href="/admin/articulos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Articulo
    </a>
</div>

<div class="admin__contenedor">
    <?php if(!empty($articulos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Articulo</th>
                    <th class="table__th table__th--ponentes" scope="col">Imagen</th>
                    <th class="table__th table__th--ponentes" scope="col">Nombre</th>
                    <th class="table__th table__th--ponentes" scope="col">Fecha</th>
                    <th class="table__th table__th--acciones" scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($articulos as $articulo) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <div class="formulario-admin__imagen">
                                <picture>
                                    <source srcset="<?php echo '/build/img/articulos/' . $articulo->imagen . '.webp'?>" type="image/webp">
                                    <source srcset="<?php echo '/build/img/articulos/' . $articulo->imagen . '.png'?>" type="image/png">
                                    <img class="formulario-admin__imagen--table" src="<?php echo '/build/img/articulos/' . $articulo->imagen . '.png'?>" alt="Imagen articulo">
                                </picture>
                            </div>
                        </td>

                        <td class="table__td">
                            <?php echo $articulo->nombre?>
                        </td>

                        <td class="table__td">
                            <?php echo $articulo->fecha ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion--editar" href="/admin/articulos/editar?id=<?php echo $articulo->id ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form class="table__formulario" action="/admin/articulos/eliminar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $articulo->id ?>">
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
        <p class="text-center">No hay Articulos Aún</p>
    <?php } ?>    
</div>

<?php
    echo $paginacion;
?>