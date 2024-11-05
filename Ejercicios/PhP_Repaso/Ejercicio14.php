14. Crea la clase DadoPoker. Las caras de un dado de poker tienen las siguientes figuras: As, K, Q, J, 7 y 8.
Crea el método tira() que no hace otra cosa que tirar el dado, es decir, genera un valor aleatorio para el objeto al que se le aplica el método.
Crea también el método nombreFigura(), que diga cuál es la figura que ha salido en la última tirada del dado en cuestión.
Crea, por último, el método getTiradas Totales() que debe mostrar el número total de tiradas entre todos los dados.
Realiza una aplicación que permita tirar un cubilete con cinco dados de poker.

<?php
echo "<pre>";

class DadoPoker
{
    private static $figuras = ["As", "K", "Q", "J", "7", "8"];
    private $ultimaFigura;
    private static $tiradasTotales = 0;

    // Método para tirar el dado y generar una figura aleatoria
    public function tira()
    {
        $indiceAleatorio = rand(0, count(self::$figuras) - 1);
        $this->ultimaFigura = self::$figuras[$indiceAleatorio];
        self::$tiradasTotales++;
    }

    // Método para obtener la última figura obtenida
    public function nombreFigura()
    {
        return $this->ultimaFigura;
    }

    // Método estático para obtener el número total de tiradas entre todos los dados
    public static function getTiradasTotales()
    {
        return self::$tiradasTotales;
    }
}

// Crear un array con cinco objetos de la clase DadoPoker
$dados = [];
for ($i = 0; $i < 5; $i++) {
    $dados[] = new DadoPoker();
}

// Tirar cada dado y mostrar el resultado
foreach ($dados as $index => $dado) {
    $dado->tira();
    echo "Dado " . ($index + 1) . ": " . $dado->nombreFigura() . "\n";
}

// Mostrar el total de tiradas realizadas
echo "Total de tiradas realizadas: " . DadoPoker::getTiradasTotales() . "\n";
echo "<pre>";
?>