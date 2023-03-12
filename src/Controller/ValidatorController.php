<?php

namespace App\Controller;

use App\Entity\Validator\ChildEntity;
use App\Entity\Validator\ParentEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidatorController extends AbstractController
{
    #[Route('/validator', name: 'validator')]
    public function index(ValidatorInterface $validator): Response
    {
        $child = new ChildEntity();
        $child->setName('toto');

        $singleChild = new ChildEntity();
        $singleChild->setName('toto');

        $parent = new ParentEntity();
        $parent
            ->setName('totos')
            ->addChild($child)
            ->setSingleChild($singleChild)
        ;

        $violations = $validator->validate($parent);

        return $this->render('validator/index.html.twig', [
            'controller_name' => 'ValidatorController',
            'violations' => $violations
        ]);
    }
}
