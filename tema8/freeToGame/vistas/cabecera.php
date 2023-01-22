<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Games</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">

            <div class='row justify-content-end mb-5 p-3 bg-secondary'>
                <div class='col-8'>
                <a href="enrutador.php?accion=mostrarJuegos"><img src="vistas/img/freetogame-logo.png"></a>
                </div>    
                <div class='col-2'>
                    <form action='enrutador.php' method='get'>
                        <select name='buscadorCat' class='form-control'>
                            <option value='' selected>Elige categoria</option>
                            <option value='shooter'>Shooter</option>
                            <option value='moba'>MOBA</option>
                            <option value='strategy'>Estrategia</option>
                            <option value='fantasy'>Fantasia</option>
                            <option value='sci-fi'>Sci-Fi</option>
                            <option value='racing'>Carreras</option>
                            <option value='fighting'>Lucha</option>
                            <option value='sports'>Deportes</option>
                            <option value='mmorpg'>MMOARPG</option>
                            <option value='action-rpg'>ARPG</option>
                        </select>
                </div>
                <div class='col-2'>
                        <input type='submit' name='buscarCat' value='Busca por Genre/Tag' class='form-control btn btn-primary'>
                    </form>
                </div>
            </div>
    