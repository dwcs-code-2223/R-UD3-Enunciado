<?php






class ReservaRepository implements IReservaRepository {

    const RUTA_FICHERO = "config" . DIRECTORY_SEPARATOR . "reservas.json";

    private $filePath;
    private $reservasArray = [];

    public function __construct() {
        $this->filePath = dirname(__FILE__, 3) . DIRECTORY_SEPARATOR . self::RUTA_FICHERO;
        $this->reservasArray = $this->getReservas();
    }

    public function getReservas(): array {

        //Leemos el fichoro JSON y se devuelve array con índices numéricos con tantos índices como reserva$reservas haya.
        // El valor del array es a su vez un array asociativo con claves "id", "titulo", "contenido"
        $arrayFromJSON = json_decode(file_get_contents($this->filePath), true);
        $arrayReservas = [];
        if ($arrayFromJSON != null) {
            foreach ($arrayFromJSON as $index => $reservasArrayAsoc) {

                $reserva = Util::json_decode_array_to_class($reservasArrayAsoc, "Reserva");
                array_push($arrayReservas, $reserva);
            }
        }

        return $arrayReservas;
    }

    private function saveReservas(array $reservas): bool {

        $writtenBytes = file_put_contents($this->filePath, json_encode($reservas));

        return ($writtenBytes !== false);
    }


    




    private function getMaxId($arrayFichero): int {
        $max_id = 0;

        $arrayReservas = array_values($arrayFichero);

        $array_ids = array_map(function ($reserva) {
            return $reserva->getId();
        }, $arrayReservas
        );

        if (count($array_ids) > 0) {
            $max_id = max($array_ids);
        }


        return ++$max_id;
    }

    
}
