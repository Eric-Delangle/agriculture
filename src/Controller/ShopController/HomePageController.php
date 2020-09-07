<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Controller\ShopController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;
use Sylius\Bundle\ShopBundle\Controller\Controller;


 class HomePageController extends HomePageController
{
    /** @var EngineInterface */
    private $templatingEngine;

    public function __construct(EngineInterface $templatingEngine)
    {
        $this->templatingEngine = $templatingEngine;
    }

    public function indexAction(Request $request): Response
    {
        if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "password")
        {
            return $this->templatingEngine->renderResponse('@SyliusShop/Homepage/index.html.twig');
        }
       
    }
}