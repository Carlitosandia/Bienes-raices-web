<?php

    //Validar que sea un ID valido
    require '../../includes/funciones.php';
    $auth = Autenticado();
    if(!$auth){
        header('Location: ../index.php');
    }
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: ../index.php');
    }

    require '../../includes/config/database.php';
    $db =  conectarDb();

    //Obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = {$id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio =  $propiedad['precio'];
    $descripcion =  $propiedad['descripcion'];
    $habitaciones  =  $propiedad['habitaciones'];
    $wc =   $propiedad['wc'];
    $estacionamiento =   $propiedad['estacionamiento'];
    $vendedores_Id =  $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];


    if($_SERVER ['REQUEST_METHOD'] === 'POST'){

       // echo "<pre>";
       // var_dump($_POST);
       // echo"</pre>";
    
       // echo "<pre>";
       // var_dump($_FILES);
        //echo"</pre>";
        //Arreglo con mensajes de //errores
        $errores = [];

        $titulo =mysqli_real_escape_string($db,  $_POST['titulo']);
        $precio =mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion =mysqli_real_escape_string($db,  $_POST['descripcion']);
        $habitaciones  = mysqli_real_escape_string($db, $_POST['habitaciones']) ;
        $wc = mysqli_real_escape_string($db,  $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db,  $_POST['estacionamiento']);
        $vendedores_Id = mysqli_real_escape_string($db,  $_POST['vendedor']);
        $creado = date('Y/m/d');

        $imagen = $_FILES ['imagen'];
        if(!$titulo){
            $errores [] = "Debes añadir un titulo";
        }

        if(!$precio){
            $errores [] = "El precio es obligatorio";
        }

        if(strlen($descripcion)>45){
            $errores [] = "La descripcion es obligatoria y debe tener menos de 45 caracteres";
        }

        if(!$habitaciones){
            $errores [] = "El numero de habitaciones obligatorio";
        }

        if(!$wc){
            $errores [] = "El numero de baños es obligatorio";
        }
        if(!$estacionamiento){
            $errores [] = "El numero de lugares de estacionamiento es obligatorio";
        }
        
        if(!$vendedores_Id){
            $errores [] = "Elige un vendedor";
        }

        //Validar por tamaño (2mbmax)
        $medida = 1000 *2000;

        if($imagen ['size']> $medida){
            $errores [] = "La imagen es muy pesada";
        }

        if(empty($errores)){
            //Subida de archivos 
            //Crear Carpeta 
            $carpetaImagenes = '../../imagenes/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }
            //Insertar en base de datos
            if($imagen['name']){
                unlink($carpetaImagenes.$propiedad['imagen']);
                //Generar Nombre Unico 
                $nombreImagen = md5( uniqid(rand(), true) ).".jpg";
                //Subir imagen 
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen);
            }else{
                $nombreImagen = $propiedad['imagen'];
            }
            $query = " UPDATE propiedades SET titulo = '{$titulo}', precio ='{$precio}', imagen = '{$nombreImagen}', descripcion ='{$descripcion}', habitaciones ={$habitaciones}, wc ={$wc}, estacionamiento ={$estacionamiento}, vendedores_Id  = {$vendedores_Id} WHERE id = $id";
            
            //echo query
            $resultado = mysqli_query($db, $query);

            if($resultado){
                //Redireccionar al usuario

                header('Location: ../index.php?resultado=2');
            }
        }
    }
        incluirTemplate('header');
?>

    <main class = "contenedor">
        <h1>Actualizar</h1>

        <a href="../index.php" class = "boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
            <?php endforeach; ?>
        <form class ="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id = "titulo" name ="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id = "precio" name ="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id = "imagen" accept="image/jpeg, image/png" name = "imagen">

                <img src="../../imagenes/<?php echo $imagenPropiedad; ?>" alt="" class = "small-image">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name = "descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>
            <fieldset>
            <legend>Informacion Propiedad:</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id = "habitaciones" name = "habitaciones" placeholder="Ej: 3" min= "1" max ="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños:</label>
            <input type="number" id = "wc" name ="wc" placeholder="Ej: 3" min= "1" max ="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" id = "estacionamiento" name = "estacionamiento" placeholder="Ej: 3" min= "1" max ="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name = "vendedor">
                    <option value="">-- Seleccione --</option>
                    <?php while($row = mysqli_fetch_assoc($resultado)) :?>
                      <option  <?php echo $vendedores_Id === $row ['id'] ? 'selected': ''; ?>   value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] . " ". $row['apellido'];?></option>
                    <?php endwhile;?>
                </select>
            </fieldset>

            <input type="submit" value = "Actualizar Propiedad" class = "boton boton-verde">
        </form>

    </main>

<?php 
    incluirTemplate('footer');
?>