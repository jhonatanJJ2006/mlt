<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor-boton">
    <a class="admin__boton" href="/admin/cursos/learn/docs/crear?id=<?php echo $curso->id ?>">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Documento
    </a>
</div>

<div class="admin__contenedor">
    <?php if(!empty($documentos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Documentos</th>
                    <th class="table__th table__th--ponentes" scope="col">Archivo</th>
                    <th class="table__th table__th--acciones" scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($documentos as $documento) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $documento->nombre ?>
                        </td>

                        <td class="table__td--acciones">
                            
                            <form class="table__formulario" action="/admin/cursos/learn/docs/eliminar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $documento->id ?>">
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
        <p class="text-center">No hay Documentos Aún</p>
    <?php } ?>    
</div>