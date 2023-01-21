<?php

namespace App\Http\Controllers;

use App\Models\CronDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    private $paginate = 20;
    protected $repository;

    public function __construct(Product $product)
    {
        $this->repository = $product;
    }

    public function apiDetails()
    {
        try { // Verificando conexão com a base de dados.
            DB::connection()->getPdo();
            $database_connection = 'success, API is working and connected to the database. 200';
        } catch (\Exception $e) {
            $database_connection = 'error, API is not connected to the database. 500';
        }

        $last_executed = CronDetail::latest()->first(); // Acessando detalhes do último CRON realizado.
        return response()->json([ // Resposta em JSON com os dados.
            'database_connection' => $database_connection,
            'last_executed' => @$last_executed->executed_at,
            'memory_usage' => @$last_executed->memory_usage,
            'execution_time' => @$last_executed->execution_time . ' Seconds',
            'status' => @$last_executed->status
        ]);
    }

    public function index()
    {
        $result = array();
        try {
            $products = $this->repository::orderBy('code', 'DESC')->paginate($this->paginate);

            $result["message_name"] = 'Processado com sucesso';
            $result["message_type"] = "success";
            $result["object"] = $products;

            // ------------- A T E N Ç Ã O -------------
            // View meia-boca feita com bootstrap para uma simples visualização de todos os produtos, permanecer comentado para retorno do JSON.
            // return view('screens.products.index', compact('products'));
        } catch (\Exception $e) {
            $result["message_name"] = $e;
            $result["message_type"] = "error";
            $result["message_exception"] = $e->getMessage();
        } finally {
            return response()->json($result);
        }
    }

    // ------------- A T E N Ç Ã O -------------

    // Método feito para caso precise de um POST para cadastro na REST api.

    // public function store(Request $request)
    // {
    //     $result = array();
    //     try {
    //         $data = $request->all();
    //         $object = $this->repository::create($data);

    //         $result["message_name"] = 'Cadastrado com sucesso';
    //         $result["message_type"] = "success";
    //         $result["object"] = $object;
    //     } catch (\Exception $e) {
    //         $result["message_name"] = $e;
    //         $result["message_type"] = "error";
    //         $result["message_exception"] = $e->getMessage();
    //     } finally {
    //         return response()->json($result);
    //     }
    // }

    public function show($code)
    {
        $result = array();
        try {
            $product = $this->repository::where('code', $code)->first();

            $result["message_name"] = 'Processado com sucesso';
            $result["message_type"] = "success";
            $result["object"] = $product;

            // ------------- A T E N Ç Ã O -------------
            // View meia-boca feita com bootstrap para uma simples visualização dos produtos, permanecer comentado para retorno do JSON.
            // return view('screens.products.product', compact('product'));
        } catch (\Exception $e) {
            $result["message_name"] = $e;
            $result["message_type"] = "error";
            $result["message_exception"] = $e->getMessage();
        } finally {
            return response()->json($result);
        }
    }

    public function update(Request $request, $code)
    {
        $result = array();
        try {
            $data = $request->all();
            $object = $this->repository::where('code', $code)->first();
            $object->update($data);

            $result["message_name"] = 'Alterado com sucesso ';
            $result["message_type"] = "success";
            $result["object"] = $object;
        } catch (\Exception $e) {
            $result["message_name"] = $e;
            $result["message_type"] = "error";
            $result["message_exception"] = $e->getMessage();
        } finally {
            return response()->json($result);
        }
    }

    public function destroy($code)
    {
        $result = array();
        try {
            $data['status'] = 'trash';
            $object = $this->repository::where('code', $code)->first();
            $object->update($data);

            $result["message_name"] = 'Status modificado para: trash';
            $result["message_type"] = "success";
            $result["object"] = $object;
        } catch (\Exception $e) {
            $result["message_name"] = $e;
            $result["message_type"] = "error";
            $result["message_exception"] = $e->getMessage();
        } finally {
            return response()->json($result);
        }
    }
}
