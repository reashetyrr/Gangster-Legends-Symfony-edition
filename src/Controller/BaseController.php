<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BaseController
 * @package App\Controller
 * @IsGranted("ROLE_USER")
 */
class BaseController extends ExtendedController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->renderTemplate('base/index.html.twig', [
            'controller_name' => 'BaseController',
            'loginPostfix' => null,
            'loginSuffix' => null,
            'alerts' => null,
            'game' => null
        ]);
    }

}
