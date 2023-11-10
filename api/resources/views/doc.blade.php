<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
<body>
    <div>
        <h1>Doc : Comment utiliser l'API Currency Converter</h1>
        <h2>Devises</h2>
        <div style="margin-left: 15px">
            <p>Afficher les Devises : <strong>(GET) http://localhost:8000/api/devises</strong> avec pour paramètre : {value}</p>
            <p>Créer un Devise : <strong>(POST) http://localhost:8000/api/devises</strong></p>
        </div>
        <h2>Paires</h2>
        <div style="margin-left: 15px">
            <p>Afficher les Paires : <strong>(GET) http://localhost:8000/api/paires</strong></p>
            <p>Afficher une Paires : <strong>(GET) http://localhost:8000/api/paires/{from_devise}/{to_devise}</strong></p>
            <p>Créer une Paires : <strong>(POST) http://localhost:8000/api/paires</strong> avec pour paramètres : {from_devise, to_devise, value}</p>
            <p>Modifier une Paires : <strong>(PUT) http://localhost:8000/api/paires/{from_devise}/{to_devise}</strong> avec pour paramètre : {value}</p>
            <p>Delete une Paires : <strong>(DELETE) http://localhost:8000/api/paires/{from_devise}/{to_devise}</strong></p>
            <p>Afficher la valeur modifier par la Paire : <strong>(GET) http://localhost:8000/api/paires/{from_devise}/{to_devise}/{value}</strong></p>
        </div>
    </div>
</body>
</html>
<style>
p {
    font-size: 1.2rem;
}
</style>
