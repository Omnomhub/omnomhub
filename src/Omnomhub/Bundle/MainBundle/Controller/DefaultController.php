<?php

namespace Omnomhub\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OmnomhubMainBundle:Default:index.html.twig');
    }
}
