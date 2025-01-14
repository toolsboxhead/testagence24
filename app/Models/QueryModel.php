<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QueryModel extends Model
{
    public function obtenerDatosUsuario($nombreUsuario)
    {
        return DB::select('CALL sp_datusuario(?)', [$nombreUsuario]);
    }

    public function obtenerDatosPerformance($fec_desde,$fec_hasta,$set_consu)
    {

        return DB::select('CALL sp_comercial_performance(?,?,?)', [$fec_desde, $fec_hasta,$set_consu]);
    }

    public function listUsuarios()
    {
        return DB::select('CALL sp_usuario_perf()');
    }

    public function dataGraphConsults($fec_desde,$fec_hasta,$set_consu)
    {

        return DB::select('CALL sp_graph_performance(?,?,?)', [$fec_desde, $fec_hasta,$set_consu]);
    }

    public function rangoGraphConsults($fec_desde,$fec_hasta,$set_consu)
    {

        return DB::select('CALL sp_mes_rango(?,?,?)', [$fec_desde, $fec_hasta,$set_consu]);
    }

    public function databarGraphConsults($fec_desde,$fec_hasta,$set_consu)
    {

        return DB::select('CALL sp_graph_performance_user(?,?,?)', [$fec_desde, $fec_hasta,$set_consu]);
    }
}
