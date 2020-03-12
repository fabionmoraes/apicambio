<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Moeda;

class AtualizaMoedas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moeda:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para atualizar moeda';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'https://www.msn.com/pt-br/dinheiro/cotacao-do-dolar';
        $dadosSite = file_get_contents($url);
        $pattern = '/<span class=\"pricecol\">([^`]*?)<\/span>/';//Padrão a ser encontrado na string $value
        preg_match_all($pattern, $dadosSite, $conteudo);

        $cop = 'https://www.msn.com/pt-br/dinheiro/ferramentas/cotacao-do-dolar/fi-COP-BRL';
        $dadoscop = file_get_contents($cop);
        $patterncop = '/<span id=\"frmrate\" class=\"ccrate\">([^`]*?)<\/span>/';//Padrão a ser encontrado na string $value
        preg_match_all($patterncop, $dadoscop, $contentcop);

        $nzd = 'https://www.msn.com/pt-br/dinheiro/ferramentas/cotacao-do-dolar/fi-NZD-BRL';
        $dadosnzd = file_get_contents($nzd);
        $patternnzd = '/<span id=\"frmrate\" class=\"ccrate\">([^`]*?)<\/span>/';//Padrão a ser encontrado na string $value
        preg_match_all($patternnzd, $dadosnzd, $contentnzd);

        // Moeda Holanda
        if ($contentnzd[1][0]) {
            $convert = strip_tags(substr($contentnzd[1][0], 8, 6));
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 17)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Colombia
        if ($contentcop[1][0]) {
            $convert = strip_tags(substr($contentcop[1][0], 8, 6));
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 15)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda USD
        if ($conteudo[1][0]) {
            $convert = strip_tags($conteudo[1][0]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 1)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda EURO
        if ($conteudo[1][1]) {
            $convert = strip_tags($conteudo[1][1]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 2)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Peso Argentino
        if ($conteudo[1][2]) {
            $convert = strip_tags($conteudo[1][2]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 3)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Libra Esterlina
        if ($conteudo[1][3]) {
            $convert = strip_tags($conteudo[1][3]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 4)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Peso Mexicano
        if ($conteudo[1][4]) {
            $convert = strip_tags($conteudo[1][4]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 5)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Peso Chileno
        if ($conteudo[1][5]) {
            $convert = strip_tags($conteudo[1][5]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 6)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Peso Uruguai
        if ($conteudo[1][6]) {
            $convert = strip_tags($conteudo[1][6]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 7)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Iene Japão
        if ($conteudo[1][7]) {
            $convert = strip_tags($conteudo[1][7]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 8)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Yuan China
        if ($conteudo[1][8]) {
            $convert = strip_tags($conteudo[1][8]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 9)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Franco Suiço
        if ($conteudo[1][9]) {
            $convert = strip_tags($conteudo[1][9]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 10)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Rand Africa do Sul
        if ($conteudo[1][10]) {
            $convert = strip_tags($conteudo[1][10]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 11)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Dólar Australiano
        if ($conteudo[1][11]) {
            $convert = strip_tags($conteudo[1][11]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 12)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Dólar Canadense
        if ($conteudo[1][12]) {
            $convert = strip_tags($conteudo[1][12]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 13)->update([
                'valor' => $moeda,
            ]);
        }

        // Moeda Dólar Cingapura
        if ($conteudo[1][13]) {
            $convert = strip_tags($conteudo[1][13]);
            $moeda = floatval(str_replace(',', ".", $convert));

            Moeda::where('id', 14)->update([
                'valor' => $moeda,
            ]);
        }

    }
}
