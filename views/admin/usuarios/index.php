<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor">
    <?php if(!empty($usuarios)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Usuario</th>
                    <th class="table__th table__th--ponentes" scope="col">Nombre</th>
                    <th class="table__th table__th--ponentes" scope="col">Email</th>
                    <th class="table__th table__th--ponentes" scope="col">Teléfono</th>
                    <th class="table__th table__th--ponentes" scope="col">Admin</th>
                    <th class="table__th table__th--ponentes" scope="col">Suscripción</th>
                    <th class="table__th table__th--acciones" scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($usuarios as $usuario) { ?>
                    <tr class="table__tr">

                        <td class="table__td">
                            <?php echo $usuario->nombre . " " . $usuario->apellido ?? '' ?>
                        </td>
                        
                        <td class="table__td">
                            <?php echo $usuario->email ?? '' ?>
                        </td>

                        <td class="table__td">
                            <?php echo $usuario->telefono ?? '' ?>
                        </td>

                        <td class="table__td">
                            <div class="usuario">
                                <?php if($usuario->admin) { ?>
                                    <div class="usuario__admin-x">
                                        <a class="usuario__admin-x--color" href="/admin/usuario/admin-logout?id=<?php echo $usuario->id ?>">
                                            <i class="fa-solid fa-user-xmark"></i>
                                            Quitar Permiso Administrativo
                                        </a>
                                    </div>
                                <?php } else { ?>    
                                    <div class="usuario__admin-plus">
                                        <a class="usuario__admin-plus--color" href="/admin/usuario/admin?id=<?php echo $usuario->id ?>">
                                            <i class="fa-solid fa-user-plus"></i>
                                            Convertir en Administrador
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </td>

                        <td class="table__td">
                            <?php if($usuario->suscripcion) { ?>
                                <div class="usuario__suscripcion-plus">
                                    <i class="fa-sharp fa-solid fa-circle-check"></i>
                                </div>
                            <?php } else { ?>
                                <div class="usuario__suscripcion-x">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </div>
                            <?php } ?>
                        </td>
                        
                        <td class="table__td--acciones table__td--acciones-disable">

                            <?php if(!$usuario->admin) { ?>
                                <form class="table__formulario" action="/admin/usuarios/eliminar" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
                                    <button class="table__accion--eliminar" type="submit">
                                        Eliminar
                                    </button>
                                </form>
                            <?php } ?>


                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>    
        <p class="text-center">No hay Usuarios Aún</p>
    <?php } ?>    
</div>

<?php
    echo $paginacion;
?>