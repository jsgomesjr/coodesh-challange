<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coodesh - Teste</title>

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- CSS da aplicação -->
    <link rel="stylesheet" href="/css/styles.css">

</head>

<body class="bg-secondary">
    <div class="container mt-5">
        <div class="row mt-5 mb-5">
            <div class="col-12 text-center text-white">
                <h3>Relação de produtos cadastrados na base de dados:</h3>
            </div>
        </div>
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Status</th>
                    <th>Imported_t</th>
                    <th>Product_name</th>
                    <th>Serving_size</th>
                    <th>Main_category</th>
                    <th>Purchase_places</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->imported_t }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->serving_size }}</td>
                        <td>{{ $product->main_category }}</td>
                        <td>{{ $product->purchase_places }}</td>
                        <td>
                            <a href="{{ route('products.show', ['code' => $product->code]) }}" class="btn btn-sm btn-info">Exibir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>



    <script src="/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
