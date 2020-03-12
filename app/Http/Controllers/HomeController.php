<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Moeda;

class HomeController extends Controller
{
    public function index()
    {
        $usd = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(1);
        $euro = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(2);
        $ars = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(3);
        $gbp = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(4);
        $mxn = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(5);
        $clp = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(6);
        $uyu = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(7);
        $iene = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(8);
        $cny = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(9);
        $chf = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(10);
        $zar = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(11);
        $aud = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(12);
        $cad = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(13);
        $cop = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(15);
        $nzd = Moeda::select('id', 'moeda', 'tipo', 'valor', 'updated_at')->find(17);

        return response()->json([
        	'usd' => array(
        		'moeda' => $usd->moeda,
        		'tipo' => $usd->tipo,
        		'valor' => number_format($usd->valor, 4),
        		'updated_at' => $usd->updated_at,
        	),
        	'euro' => array(
        		'moeda' => $euro->moeda,
        		'tipo' => $euro->tipo,
        		'valor' => number_format($euro->valor, 4),
        		'updated_at' => $euro->updated_at,
        	),
        	'ars' => array(
        		'moeda' => $ars->moeda,
        		'tipo' => $ars->tipo,
        		'valor' => number_format($ars->valor, 4),
        		'updated_at' => $ars->updated_at,
        	),
        	'gbp' => array(
        		'moeda' => $gbp->moeda,
        		'tipo' => $gbp->tipo,
        		'valor' => number_format($gbp->valor, 4),
        		'updated_at' => $gbp->updated_at,
        	),
        	'mxn' => array(
        		'moeda' => $mxn->moeda,
        		'tipo' => $mxn->tipo,
        		'valor' => number_format($mxn->valor, 4),
        		'updated_at' => $mxn->updated_at,
        	),
        	'clp' => array(
        		'moeda' => $clp->moeda,
        		'tipo' => $clp->tipo,
        		'valor' => number_format($clp->valor, 4),
        		'updated_at' => $clp->updated_at,
        	),
        	'uyu' => array(
        		'moeda' => $uyu->moeda,
        		'tipo' => $uyu->tipo,
        		'valor' => number_format($uyu->valor, 4),
        		'updated_at' => $uyu->updated_at,
        	),
        	'iene' => array(
        		'moeda' => $iene->moeda,
        		'tipo' => $iene->tipo,
        		'valor' => number_format($iene->valor, 4),
        		'updated_at' => $iene->updated_at,
        	),
        	'cny' => array(
        		'moeda' => $cny->moeda,
        		'tipo' => $cny->tipo,
        		'valor' => number_format($cny->valor, 4),
        		'updated_at' => $cny->updated_at,
        	),
        	'zar' => array(
        		'moeda' => $zar->moeda,
        		'tipo' => $zar->tipo,
        		'valor' => number_format($zar->valor, 4),
        		'updated_at' => $zar->updated_at,
        	),
        	'aud' => array(
        		'moeda' => $aud->moeda,
        		'tipo' => $aud->tipo,
        		'valor' => number_format($aud->valor, 4),
        		'updated_at' => $aud->updated_at,
        	),
        	'cad' => array(
        		'moeda' => $cad->moeda,
        		'tipo' => $cad->tipo,
        		'valor' => number_format($cad->valor, 4),
        		'updated_at' => $cad->updated_at,
        	),
        	'cop' => array(
        		'moeda' => $cop->moeda,
        		'tipo' => $cop->tipo,
        		'valor' => number_format($cop->valor, 4),
        		'updated_at' => $cop->updated_at,
        	),
        	'nzd' => array(
        		'moeda' => $nzd->moeda,
        		'tipo' => $nzd->tipo,
        		'valor' => number_format($nzd->valor, 4),
        		'updated_at' => $nzd->updated_at,
        	),
        ]);
    }

    public function view()
    {
    	$cop = 'https://www.msn.com/pt-br/dinheiro/ferramentas/cotacao-do-dolar/fi-COP-BRL';
    	$dadosSite = file_get_contents($cop);
    	$pattern = '/<span id=\"frmrate\" class=\"ccrate\">([^`]*?)<\/span>/';//Padrão a ser encontrado na string $value
    	preg_match_all($pattern, $dadosSite, $conteudo);
    	$convert = strip_tags(substr($conteudo[1][0], 8, 6));
        $moeda = str_replace(',', ".", $convert);

        return response()->json($moeda);
    }
}
