<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor-boton">
    <a class="admin__boton" href="/admin/cursos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Curso
    </a>
</div>

<div class="admin__contenedor">
    <?php if(!empty($cursos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Curso</th>
                    <th class="table__th table__th--ponentes" scope="col">Imagen</th>
                    <th class="table__th table__th--ponentes" scope="col">Nombre</th>
                    <th class="table__th table__th--ponentes" scope="col">Ponente</th>
                    <th class="table__th table__th--acciones" scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($cursos as $curso) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <div class="formulario-admin__imagen">
                                <picture>
                                    <source class="" srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.webp'?>" type="image/webp">
                                    <source class="" srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" type="image/png">
                                    <img class="formulario-admin__imagen--table" src="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" alt="Imagen curso">
                                </picture>
                            </div>
                        </td>

                        <td class="table__td">
                            <?php echo $curso->nombre ?? '' ?>
                        </td>

                        <td class="table__td">
                            <?php
                                foreach($ponentes as $ponente) {
                                    if($curso->ponente_id === $ponente->id) {
                                        echo $ponente->nombre . ' ' . $ponente->apellido ?? ''; 
                                    }
                                }
                            ?>                    
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion--editar" href="/admin/cursos/learn?id=<?php echo $curso->id ?>">
                                <i class="fa-solid fa-graduation-cap"></i>
                                Learn
                            </a>

                            <a class="table__accion--editar" href="/admin/cursos/editar?id=<?php echo $curso->id ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form class="table__formulario" action="/admin/cursos/eliminar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $curso->id ?>">
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
        <p class="text-center">No hay Cursos Aún</p>
    <?php } ?>    
</div>

<?php
    echo $paginacion;
?>