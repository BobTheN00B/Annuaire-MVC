<!-- Template de base avec le moteur de template Smarty -->
<!DOCTYPE html>
<html>
    <head>
        <title>{$vue["titre"]|escape}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-custom mb-4">
            <div class="container">
                <a class="navbar-brand" href="index.php">Annuaire</a>
                <div class="navbar-nav gap-2">
                    <a class="nav-link" href="index.php?page=accueil&action=list">Accueil</a>
                    <a class="nav-link" href="index.php?page=categorie&action=list">Catégories</a>
                    {if $isConnected}
                        <a class="nav-link" href="index.php?page=site&action=list">Mes sites</a>
                        <a class="nav-link" href="index.php?page=utilisateur&action=list">Mon compte</a>
                        <a class="nav-link" href="index.php?page=utilisateur&action=logout">Déconnexion</a>
                    {else}
                        <a class="nav-link" href="index.php?page=utilisateur&action=login">Connexion</a>
                        <a class="nav-link" href="index.php?page=utilisateur&action=register">Inscription</a>
                    {/if}
                </div>
            </div>
        </nav>

        <main class="container">
            <h1>{$vue["titre"]|escape}</h1>
            {include file={$tpl}}
        </main>
    </body>
</html>

