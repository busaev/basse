<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use App\Entity\Author;

class AuthorController extends FOSRestController
{
    /**
     * @Rest\Get("/author")
     * @return View|array
     */
    public function getAction()
    {
        $result = $this->getDoctrine()->getRepository(Author::class)->findAll();
        if ($result === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return new View($result);
    }
}
