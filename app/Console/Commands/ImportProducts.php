<?php

namespace App\Console\Commands;

use App\Models\CronDetail;
use App\Models\Product;
use Illuminate\Console\Command;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ImportProducts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sincronização com a base de dados open food facts';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $start = microtime(true);

            ini_set('max_execution_time', '300'); //
            ini_set('max_execution_time', '0'); //

            // Capturar o nome dos arquivos.
            $fileNames = file_get_contents('https://challenges.coode.sh/food/data/json/index.txt');
            $fileNames = explode("\n", $fileNames);
            array_pop($fileNames); // Remove o último índice do array, que está em branco e atrapalhando o HTTP request

            foreach ($fileNames as $fileName) {
                $url = 'https://challenges.coode.sh/food/data/json/' . $fileName;
                $gz = gzopen($url, 'r');
                $jsonData = '';
                while (!gzeof($gz)) {
                    $jsonData .= gzread($gz, 8192);
                }
                gzclose($gz);

                $arrayJson = explode("\n", $jsonData);
                $jsonData = array_slice($arrayJson, 0, 100);

                for ($i = 0; $i < 100; $i++) {
                    $jsonDecoded = json_decode($jsonData[$i]);

                    $data['code'] = str_replace('"', '', @$jsonDecoded->code);
                    $data['status'] = 'published';
                    $data['imported_t'] = date('Y-m-d H:i:s');
                    $data['url'] = @$jsonDecoded->url;
                    $data['creator'] = @$jsonDecoded->creator;
                    $data['created_t'] = @$jsonDecoded->created_t;
                    $data['last_modified_t'] = @$jsonDecoded->last_modified_t;
                    $data['product_name'] = @$jsonDecoded->product_name;
                    $data['quantity'] = @$jsonDecoded->quantity;
                    $data['brands'] = @$jsonDecoded->brands;
                    $data['categories'] = @$jsonDecoded->categories;
                    $data['labels'] = @$jsonDecoded->labels;
                    $data['cities'] = @$jsonDecoded->cities;
                    $data['purchase_places'] = @$jsonDecoded->purchase_places;
                    $data['stores'] = @$jsonDecoded->stores;
                    $data['ingredients_text'] = @$jsonDecoded->ingredients_text;
                    $data['traces'] = @$jsonDecoded->traces;
                    $data['serving_size'] = @$jsonDecoded->serving_size;
                    $data['serving_quantity'] = @$jsonDecoded->serving_quantity;
                    $data['nutriscore_score'] = @$jsonDecoded->nutriscore_score;
                    $data['nutriscore_grade'] = @$jsonDecoded->nutriscore_grade;
                    $data['image_url'] = @$jsonDecoded->image_url;

                    $existingProduct = Product::where('code', $data['code'])->first();
                    if ($existingProduct) {
                        $existingProduct->update($data);
                    } else {
                        Product::create($data);
                    }
                }
            }

            $end = microtime(true);
            $execution_time = ($end - $start);

            $cron['executed_at'] = date('Y-m-d H:i:s');
            // $cron['memory_usage'] = memory_get_usage(true);
            $cron['execution_time'] = $execution_time;
            $cron['status'] = 'success';
            CronDetail::create($cron);

        } catch (\Exception $e) {
            $result["message_name"] = $e;
            $result["message_type"] = "error";
            $result["message_exception"] = $e->getMessage();

            $cron['executed_at'] = date('Y-m-d H:i:s');
            // $cron['memory_usage'] = memory_get_usage(true);
            $cron['execution_time'] = $execution_time;
            $cron['status'] = 'failure';
            CronDetail::create($cron);
        }

        return Command::SUCCESS;
    }
}
