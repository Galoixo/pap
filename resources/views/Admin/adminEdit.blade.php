<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonte do Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Fonte Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- Fonte Figtree -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="font-figtree">
    <center>
        <div id="event-create-container" class="col-md-6 offset-md3">
            <h1>Editar {{ $produto->nome}}</h1>
            <form action="/admin/update/{{$produto->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group"> 
                    <label for="imagem">Imagem do {{ $produto->nome}}</label> 
                    <input type="file" id="imagem" name="imagem" class="from-control-file">
                    <img src="{{ asset('img/games/'.$produto->imagem) }}" alt=" {{ $produto->nome}} " class="img-preview">
                </div>
                <div class="form-group"> 
                    <label for="nome">Nome:</label> 
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome..." value=" {{$produto->nome}} ">
                </div>
                <div class="form-group">
                    <label for="tipo_vinho">Tipo do vinho:</label> 
                    <select name="tipo_vinho" id="tipo_vinho" class="form-control">
                        <option value="0">Arinto</option>
                        <option value="1" {{ $produto->tipo_vinho == 1 ? "selected='selected'": ""}}>Loureiro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" class="form-control" id="preco" name="preco" placeholder="Preço..." value="{{ $produto->preco}}">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label> 
                    <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição..." >{{ $produto->descricao}}</textarea>
                </div>
                <div class="form-group">
                    <label for="qnt_stock">Quantidade em stock:</label>
                    <input type="number" class="form-control" id="qnt_stock" name="qnt_stock" placeholder="Preço..." value="{{ $produto->qnt_stock}}">
                </div>
                <div class="form-group">
                    <label for="ispack">É em pack?</label> 
                    <select name="ispack" id="ispack" class="form-control">
                        <option value="0">Não</option>
                        <option value="1" {{ $produto->ispack == 1 ? "selected='selected'": ""}}>sim</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ano_colheita">Ano de colheita:</label>
                    <input type="number" class="form-control" id="ano_colheita" name="ano_colheita" placeholder="Preço..." value="{{ $produto->ano_colheita}}">
                </div>
                <input type="submit" class="btn btn-primary" value="Atualizar">
            </form>
        </div>
    </center>


</body>

</html>
