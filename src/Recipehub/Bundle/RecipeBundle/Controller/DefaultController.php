<?php

namespace Recipehub\Bundle\RecipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RecipehubRecipeBundle:Default:index.html.twig');
    }
}
