<?php

include_once 'api_db.php';

class Pelicula extends DB{
    
    function obtenerPeliculas(){
        $query = $this->connect()->query('SELECT * FROM merca ORDER BY idViaje DESC LIMIT 0,5');
        return $query;
    }
    
    function obtenerPelicula($idViaje){
        $query = $this->connect()->prepare('SELECT * FROM merca WHERE idViaje= :idViaje');
        $query->execute(['idViaje' => $idViaje]);
        return $query;
    }
    
    function nuevaPelicula($pelicula){
        $query = $this->connect()->prepare('INSERT INTO merca (Cliente, rfc, moneda, mercancia, importe, TipoOperacion, FechaAlta, detalles, TipoTransporte, FechaSalida, FechaLlegada, folio, porigen, eorigen, corigen, pdestino, edestino, cdestino, Coberturas1, cuota, prima, iva, total) VALUES (:Cliente, :rfc, :moneda, :mercancia, :importe, :TipoOperacion, :FechaAlta, :detalles, :TipoTransporte, :FechaSalida, :FechaLlegada, :folio, :porigen, :eorigen, :corigen, :pdestino, :edestino, :cdestino, :Coberturas1, :cuota, :prima, :iva, :total)');
        $query->execute(['Cliente' => $pelicula['Cliente'], 'rfc' => $pelicula['rfc'], 'moneda' => $pelicula['moneda'], 'mercancia' => $pelicula['mercancia'], 'importe' => $pelicula['importe'], 'TipoOperacion' => $pelicula['TipoOperacion'], 'FechaAlta' => $pelicula['FechaAlta'], 'detalles' => $pelicula['detalles'], 'TipoTransporte' => $pelicula['TipoTransporte'], 'FechaSalida' => $pelicula['FechaSalida'], 'FechaLlegada' => $pelicula['FechaLlegada'], 'folio' => $pelicula['folio'], 'porigen' => $pelicula['porigen'], 'eorigen' => $pelicula['eorigen'], 'corigen' => $pelicula['corigen'], 'pdestino' => $pelicula['pdestino'], 'edestino' => $pelicula['edestino'], 'cdestino' => $pelicula['cdestino'], 'Coberturas1' => $pelicula['Coberturas1'], 'cuota' => $pelicula['cuota'], 'prima' => $pelicula['prima'], 'iva' => $pelicula['iva'], 'total' => $pelicula['total']]);
        return $query;
    }
}

?>

<!--SELECT * FROM merca ORDER BY idViaje ASC LIMIT 0,3-->

<!--SELECT V.idViaje, V.idCliente, UCASE(V.Cliente) AS 'Cliente', V.rfc, V.moneda, V.mercancia, V.importe, V.TipoOperacion, V.FechaAlta, V.detalles, V.TipoTransporte, V.FechaSalida, V.FechaLlegada, V.folio, V.porigen, V.eorigen, V.corigen, V.pdestino, V.edestino, V.cdestino, V.poliza, V.cuota, V.prima, V.gastosexp, V.iva, V.total FROM merca V LEFT JOIN clientes C ON V.idCliente=C.idCliente ORDER BY V.idViaje DESC-->