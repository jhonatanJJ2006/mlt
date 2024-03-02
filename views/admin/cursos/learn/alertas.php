<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor-boton">
    <a class="admin__boton" href="/admin/cursos/learn/alerts/crear?id=<?php echo $curso->id ?>">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Alerta
    </a>
</div>

<div class="admin__contenedor">
    <?php if(!empty($alertas)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Alertas</th>
                    <th class="table__th table__th--ponentes" scope="col">Texto</th>
                    <th class="table__th table__th--ponentes" scope="col">Fecha</th>
                    <th class="table__th table__th--ponentes" scope="col">Hora</th>
                    <th class="table__th table__th--acciones" scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($alertas as $alerta) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $alerta->nombre ?>
                        </td>

                        <td class="table__td">
                            <?php echo $alerta->fecha ?>
                        </td>

                        <td class="table__td">
                            <?php echo $alerta->hora ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion--editar" href="/admin/cursos/learn/alerts/editar?id=<?php echo $alerta->id ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form class="table__formulario" action="/admin/cursos/learn/alerts/eliminar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $alerta->id ?>">
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
        <p class="text-center">No hay Alertas Aún</p>
    <?php } ?>    
</div>