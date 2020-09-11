<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body >
    <div class ='container'>
        <h1>Lista de Compras</h1>
        <div>
            <?php foreach($Items as $item) {?>
                <?=$item->nome?><?=$item->done?>
                <a href=del-rota?id=<?=$item->id?>>x</a>
                <a href=done-rota?id=<?=$item->id?>&done=<?=$item->done?>>v</a>
                
                <br>
            <?php }?>
        </div>

        <form  action="Add-rota" method="GET">
            <label>Item</label>
            <div>
                <input class="form-control" name="nomeItem" type="text">
            </div>
            <button class="btn btn-primary" >enviar</button>

        
        </form>


    </div>
</body>
</html>