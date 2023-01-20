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

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="row bg-white border rounded p-5">
                <div class="col-6 text-center">
                    <img src="{{ $product->image_url }}" alt="" height="300px">
                </div>
                <div class="col-6 justify-content-center align-items-center">
                    <h3>{{ $product->product_name }} {{ $product->quantity }}</h3>
                    <p>Barcode: {{ $product->code }}p>
                        <strong>Quantity: </strong>{{ $product->quantity }} <br>
                        <strong>Brands: </strong>{{ $product->brands }} <br>
                        <strong>Categories: </strong>{{ $product->categories }} <br>
                        <strong>Ingredients: </strong>{{ $product->ingredients_text }} <br>
                        <strong>Stores: </strong>{{ $product->stores }} <br>
                        <strong>Cities: </strong>{{ $product->cities }} <br>
                        <strong>Countries where sold: </strong>{{ $product->purchase_places }} <br>
                </div>
                <div class="col-12 mt-5 text-center">
                    <a href="{{ route('products.index') }}"><button class="btn btn-info">Voltar para
                            listagem</button></a>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
