<?php
    require '../includes/funciones.php';
    $auth = Autenticado();
    if(!$auth){
        header('Location: ../index.php');
    }
    
    //Importar base de datos
    //Importar la conexion
    require '../includes/config/database.php';
    $db = conectarDb();

    //Escribir el query
    $query = "SELECT * FROM propiedades";
    //Consultar la base de datos
    $resultadoSelect = mysqli_query($db, $query);

    //Muesta mensaje condiciional
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST ['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if($id){
            //Eliminar Archivo
            $query  = "SELECT imagen FROM propiedades WHERE id = {$id}";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);
            unlink('../imagenes/' . $propiedad['imagen']);

            //Elimnar Propiedad
            $query = "DELETE FROM propiedades WHERE id = {$id}";


            $resultado = mysqli_query($db, $query);
            if($resultado){
                header('Location: ./index.php?resultado=3');
            }
        }
    }

    //Icluye template
    
    incluirTemplate('header');
?>

    <main class = "contenedor">
        <h1>Administrador de Bienes Raices</h1>
        <?php if (intval($resultado) ===1):?>
            <p class = "alerta exito">Anuncio Creado Correctamente</p>
        <?php endif; ?>
        <?php if (intval($resultado) ===2):?>
            <p class = "alerta exito">Anuncio Actualizado Correctamente</p>
        <?php endif; ?>
        <?php if (intval($resultado) ===3):?>
            <p class = "alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif; ?>
        <a href="./propiedades/crear.php" class = "boton boton-verde">Nueva Propiedad</a>


        <table class = "propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrando los resultados -->
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoSelect)):?>
                <tr>
                    <td><?php echo $propiedad['id']?></td>
                    <td><?php echo $propiedad['titulo']?></td>
                    <td> <img src="../imagenes/<?php echo $propiedad['imagen']?>" class = "imagen-tabla"> </td>
                    <td> $<?php echo $propiedad['precio']?> </td>
                    <td>
                        <form method= "POST" class ="w-100">

                            <input type="hidden" name = "id" value = "<?php echo $propiedad['id']; ?>">
                            <input type = "submit" class = "boton-rojo-block" value = "Eliminar">
                        </form>
                        <a href="./propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>"class = "boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>

    </main>

<?php 

   //Cerrar la conexion          
   mysqli_close($db);   
    incluirTemplate('footer');
?>