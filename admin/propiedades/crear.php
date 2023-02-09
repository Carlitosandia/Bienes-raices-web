<?php
    require '../../includes/funciones.php';
    $auth = Autenticado();
    if(!$auth){
        header('Location: ../index.php');
    }
    require '../../includes/config/database.php';
    $db =  conectarDb();

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones  = '';
    $wc =  '';
    $estacionamiento =  '';
    $vendedores_Id = '';


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
        if(!$imagen['name'] || $imagen['error']){
            $errores [] = "La imagen es obligatoria ";
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
            //Generar Nombre Unico 
            $nombreImagen = md5( uniqid(rand(), true) ).".jpg";

            //Subir imagen 
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen);
            //Insertar en base de datos
            $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creada, vendedores_id ) VALUES ( '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_Id' ) ";

            //echo query
            $resultado = mysqli_query($db, $query);

            if($resultado){
                //Redireccionar al usuario

                header('Location: ../index.php?resultado=1');
            }
        }
    }
        incluirTemplate('header');
?>

    <main class = "contenedor">
        <h1>Crear</h1>

        <a href="../index.php" class = "boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
            <?php endforeach; ?>
        <form class ="formulario" method="POST" action="./crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id = "titulo" name ="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id = "precio" name ="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id = "imagen" accept="image/jpeg, image/png" name = "imagen">

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

            <input type="submit" value = "Crear Propiedad" class = "boton boton-verde">
        </form>

    </main>

<?php 
    incluirTemplate('footer');
?>