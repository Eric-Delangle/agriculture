<div id="pass">
    <p>Veuillez entrer le mot de passe :</p>
    <form action="" method="post">
        <p>
            <input type="password" name="mot_de_passe" />
            <input type="submit" value="Valider" />
        </p>
    </form>
</div>
<?php

use App\Kernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__) . '/config/bootstrap.php';

if (isset($_POST['mot_de_passe']) and $_POST['mot_de_passe'] ==  "password") // Si le mot de passe est bon
{

    if ($_SERVER['APP_DEBUG']) {
        umask(0000);

        Debug::enable();
    }

    if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
        Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
    }

    if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
        Request::setTrustedHosts([$trustedHosts]);
    }

    $kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
    $request = Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
} else {
    echo "Mauvais mot de passe";
}
