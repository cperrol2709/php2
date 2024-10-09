Crea un programa de tres páginas con las siguientes funciones:
1. Una primera página con un formulario que nos pida un número de elementos:

    <form enctype="multipart/form-data" action="Datos.php" method="post">
    <p>Introduzca el numero de elementos: <input type="text" name="nombre" value=""></p>

    <p>
        <input type="submit" value="Enviar" name="enviar">

        &nbsp;
        
        <button type="reset" value="Borrar" name="boton2">Borrar</button>
    </p>
    
</form>

2. Una segunda página que compruebe que el dato introducido sea un entero entre 1 y 10.
a) Si no lo es, que nos dé un aviso y solo te permita volver al formulario inicial.
b) Si es correcto, que te muestre un formulario con tantas casillas de texto como número
hayamos indicado en el primer formulario.
Esas casillas son de texto libre y, una vez rellenas, generará una matriz en la variable
$_POST. Si le damos a enviar, que nos envíe a una tercera página de resultado, que
mostrará tanto la información enviada como la inversa.
3. La tercera página incluirá una función llamada “permutación” que hará que permute todos
los elementos de la matriz, mostrando algo así: