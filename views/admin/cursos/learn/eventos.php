<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor-boton">
    <a class="admin__boton" href="/admin/cursos/learn/events/crear?id=<?php echo $curso->id ?>">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Evento
    </a>
</div>

<div class="admin__contenedor">
    <?php if(!empty($eventos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Eventos</th>
                    <th class="table__th table__th--ponentes" scope="col">Nombre</th>
                    <th class="table__th table__th--ponentes" scope="col">Url</th>
                    <th class="table__th table__th--ponentes" scope="col">Fecha</th>
                    <th class="table__th table__th--acciones" scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($eventos as $evento) { ?>
                    <tr class="table__tr">

                        <td class="table__td">
                            <?php echo $evento->nombre ?>
                        </td>

                        <td class="table__td">
                            <?php echo $evento->url ?>
                        </td>

                        <td class="table__td">
                            <p><?php echo $evento->fecha ?></p>
                            <p><?php echo $evento->hora ?></p>
                        </td>

                        <td class="table__td--acciones">

                            <a class="table__accion--editar" href="/admin/cursos/learn/events/editar?id=<?php echo $evento->id ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            
                            <form class="table__formulario" action="/admin/cursos/learn/events/eliminar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $evento->id ?>">
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
        <p class="text-center">No hay Eventos Aún</p>
    <?php } ?>    
</div>