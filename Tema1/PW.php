<!DOCTYPE html>
<html>
    <head> <title> Relacion de ejercicios 1 </title> </head>
    <body>
        <h1>EJ.Tema 1</h1>
        <h4>1. Concatenar dos cadenas de texto con el operador (.) e imprimir su resultado</h4>
        <?php
            $cad1 = 'Esta es la primera parte de la cadena, ';
            $cad2 = 'esta es la segunda parte de la cadena.';
            echo $cad1 . $cad2;
        ?>
        <h4>2. Hacer un programa que sume dos variables que almacenan dos números distintos</h4>
        <?php
            function suma($valor1,$valor2){
                echo "El resultado de la suma de $valor1 + $valor2 = ", $valor1 + $valor2;
            }
            $num1 = 73;
            $num2 = 12;
            suma($num1,$num2);
        ?>
        <h4>3. Hacer un programa que muestre en pantalla información de PHP con la función phpinfo(). <br>Muestre la información centrada horizontalmente en la pantalla.</h4>
        <?php
            //echo phpinfo();
        ?>
        <h4>4. Mostrar en pantalla una tabla de 10 por 10 con los números del 1 al 100.</h4>
        <table border="2">
            <?php for($index=1;$index<=100;$index++):?>
                <?php if($index == 1):?>
                    <tr>
                <?php endif; ?>
                <?php echo "<td>". $index."</td>"; ?>
                <?php if($index % 10 == 0):?>
                    </tr>
                <?php endif; ?>
            <?php endfor; ?>
        </table>
        <h4>5. Ídem al anterior, pero colorear las filas alternando gris y blanco. Además, el tamaño será una constante: define(TAM, 10)</h4>
        <table border="2">
            <?php define("TAM", 10); ?>
            <?php $color = 0 ?>
            <?php for($index=1;$index<=100;$index++):?>
                <?php if($index == 1):?>
                    <tr>
                <?php endif; ?>
                <?php if($color == 0):?>
                    <?php echo "<td bgcolor='grey'>"."<FONT size=10>". $index ."</FONT>"."</td>"; $color = 1;?>
                <?php elseif($color == 1):?>
                    <?php echo "<td bgcolor='white'>"."<FONT size=10>". $index ."</FONT>"."</td>"; $color = 0;?>
                <?php endif; ?>
                <?php if($index % 10 == 0):?>
                    </tr>
                <?php endif; ?>
            <?php endfor; ?>
        </table>
        <h4>6. Mostrar una tabla de 4 por 4 que muestre las primeras 4 potencias de los números del 1 al 4
        (hacer una función que las calcule invocando la función pow). En PHP las funciones hay que
        definirlas antes de invocarlas. Los parámetros se indican con su nombre ($cantidad) si son
        por valor y antecedidos de & (&$cantidad) si son por referencia</h4>
        <?php 
            function elevar($cantidad,$valor){
                return pow($cantidad,$valor);
            }
        ?>
        <table border="2">
            <?php for($index=1;$index<=4;$index++):?>
                <tr>
                    <?php for($index2=1;$index2<=4;$index2++):?>
                        <?php echo "<td>". elevar($index,$index2)."</td>"; ?>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
        <h4>7. Almacene en un vector los 10 primeros número pares.
        Imprímalos cada uno en una línea (recuerde que el salto de línea en HTML es <BR>).</h4>
        <?php
            $VectorArray = array();
            for($index = 1; $index < 25; $index++){
                if($index % 2 == 0 && sizeof($VectorArray) < 10){
                   array_push($VectorArray,$index);
                }
            }
            foreach($VectorArray as $elemento){
                echo $elemento." ";
            }
        ?>
        <h4>8. Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
        $v[1]=90;
        $v[30]=7;
        $v['e']=99;
        $v['hola']=43;</h4>
        <?php
            $v[1]=90;
            $v[30]=7;
            $v['e']=99;
            $v['hola']=43;
            foreach($v as $elemento){
                echo $elemento." ";
            }
        ?>
        
        <h4>9. Hacer un programa que muestre en una tabla de 4 columnas todas las imágenes de el
        directorio "fotos". Para ello consulte el manual (en concreto la referencia de funciones de
        directorios). Suponga que en el directorio sólo existen fotos.</h4>

        <?php $Directorio = 'C:/xampp/htdocs/PW/resources/img/'; ?>
        <table border="2">
            <tr>
                <?php
                    $contador = 0;
                    foreach(glob("$Directorio"."*.jpg") as $fotos){
                        if($contador < 4){
                            echo "<td>"."<img src='$fotos'>"."</td>";
                            $contador++;
                        }else{
                            $contador = 0;
                            echo "<tr>"."<img src='$fotos'>"."</tr>";
                        }
                    }
                ?>
            </tr>
        </table>

        <h4>10. Ídem al anterior, pero que muestre las fotos en 100x100 y que al pulsar abra la foto entera.
        Compruebe que sólo muestra fotos con extensión .jpg, .png, bmp o .gif (haga una función que
        lo compruebe usando las expresiones regulares como aparecen en el manual).</h4>
        <?php $Directorio = 'C:/xampp/htdocs/PW/resources/img/'; 
        ?>
        <table border="2">
            <tr>
                <?php
                    $contador = 0;
                    foreach(glob("$Directorio"."*.*") as $fotos){
                        if($contador < 4){
                            echo "<td>"."<a href='C:/xampp/htdocs/PW/resources/img/$fotos'>"."<img src='$fotos' width='100' height='100'>"."</a>"."</td>";
                            $contador++;
                        }else{
                            $contador = 0;
                            echo "<tr>"."<img src='$fotos'>"."</tr>";
                        }
                    }
                ?>
            </tr>
        </table>
        
        <h4>11.Hacer un euroconversor de euros a libras.</h4>
        <form method="post" action="">
            <label for="euros">Euros:</label>
            <input type="number" name="cant" value="">
            <input type="submit" value="Convertir">
        </form>
        <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $cantidad = $_POST['cant'];

                $cambio = $cantidad*0.87;
                echo "<p> $cambio libras </p>";
            }
        ?>

    <h4>12. Hacer un conversor de euro a libras o a dólares (que el usuario elija una moneda y sólo una)</h4>
    <form method="post" action="">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" value="">
            <label for="moneda">Moneda:</label>
            <select name="moneda" id="moneda" required>
                <option value="libras">Libras</option>
                <option value="dolares">Dólares</option>
            </select>
            <input type="submit" value="Convertir">
        </form>
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cantidad = $_POST["cantidad"];
                $moneda = $_POST["moneda"];
                $tipo_cambio = 0;
    
                if ($moneda == "libras") {
                    $tipo_cambio = 0.87; // 1 euro = 0.87 libras
                    $moneda_simbolo = "£";
                } else if ($moneda == "dolares") {
                    $tipo_cambio = 1.06; // 1 euro = 1.06 dólares
                    $moneda_simbolo = "$";
                }
    
                $conversion = $cantidad * $tipo_cambio;
    
                echo "<p>$cantidad euros son $moneda_simbolo$conversion $moneda.</p>";
            }
        ?>
        <h4>14. Realizar un formulario que pida a un alumno su información personal (nombre, edad, sexo,
        ciudad de nacimiento, ciudad de residencia, licenciatura, curso, etc…) utilizando todos los
        tipos de inputs vistos en clase. Posteriormente redacte dinámicamente un párrafo que resuma
        la biografía del alumno y muéstrelo por pantalla.</h4>

        <form method="post" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" required>

            <label for="sexo">Sexo:</label>
            <input type="radio" name="sexo" id="sexo_hombre" value="Hombre" required>
            <label for="sexo_hombre">Hombre</label>
            <input type="radio" name="sexo" id="sexo_mujer" value="Mujer" required>
            <label for="sexo_mujer">Mujer</label>

            <label for="ciudad_nacimiento">Ciudad de nacimiento:</label>
            <input type="text" name="ciudad_nacimiento" id="ciudad_nacimiento" required>

            <label for="ciudad_residencia">Ciudad de residencia:</label>
            <input type="text" name="ciudad_residencia" id="ciudad_residencia" required>

            <label for="licenciatura">Licenciatura:</label>
            <select name="licenciatura" id="licenciatura" required>
                <option value="ingenieria">Ingeniería</option>
                <option value="ciencias">Ciencias</option>
                <option value="letras">Letras</option>
                <option value="economia">Economía</option>
            </select>

            <label for="curso">Curso:</label>
            <input type="text" name="curso" id="curso" required>

            <label for="biografia">Biografía:</label>
            <textarea name="biografia" id="biografia" rows="5" required></textarea>

            <label for="aceptar_terminos">Acepto los términos y condiciones:</label>
            <input type="checkbox" name="aceptar_terminos" id="aceptar_terminos" required>

            <input type="submit" value="Enviar">
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST["nombre"];
                $edad = $_POST["edad"];
                $sexo = $_POST["sexo"];
                $ciudad_nacimiento = $_POST["ciudad_nacimiento"];
                $ciudad_residencia = $_POST["ciudad_residencia"];
                $licenciatura = $_POST["licenciatura"];
                $curso = $_POST["curso"];
                $biografia = $_POST["biografia"];

                $resumen = "Me llamo $nombre, tengo $edad años y soy $sexo. Nací en $ciudad_nacimiento y actualmente vivo en $ciudad_residencia. Estudio $licenciatura en el curso $curso. $biografia";

                echo "<p>$resumen</p>";
            }
        ?>
    </body>
</html1>