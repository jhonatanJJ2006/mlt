<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor-boton">
    <a class="admin__boton" href="/admin/revista/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Nueva Revista
    </a>
</div>

<div class="admin__contenedor">
    <?php if(!empty($revistas)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">PDF</th>
                    <th class="table__th table__th--ponentes" scope="col">PDF</th>
                    <th class="table__th table__th--ponentes" scope="col">Nombre</th>
                    <th class="table__th table__th--acciones" scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($revistas as $revista) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <div class="formulario-admin__imagen">
                                <picture>
                                    <source class="" srcset="<?php echo '/build/revistas/img/' . $revista->imagen . '.webp'?>" type="image/webp">
                                    <source class="" srcset="<?php echo '/build/revistas/img/' . $revista->imagen . '.png'?>" type="image/png">
                                    <img class="formulario-admin__imagen--table" src="<?php echo '/build/revistas/img/' . $revista->imagen . '.png'?>" alt="Imagen Revista">
                                </picture>
                            </div>
                        </td>

                        <td class="table__td">
                            <?php echo $revista->nombre ?> 
                        </td>

                        <td class="table__td--acciones">

                            <a class="table__accion--editar" href="/admin/revista/editar?id=<?php echo $revista->id ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            
                            <form class="table__formulario" action="/admin/revista/eliminar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $revista->id ?>">
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
        <p class="text-center">No hay Revistas Aún</p>
    <?php } ?>    
</div>

<?php
    echo $paginacion;
?>