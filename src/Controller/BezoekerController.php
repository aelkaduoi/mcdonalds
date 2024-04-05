<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BezoekerController extends AbstractController
{
    #[Route('/bezoeker', name: 'app_bezoeker')]
    public function index(): Response
    {
        return $this->render('bezoeker/index.html.twig', [
            'controller_name' => 'BezoekerController',
            'user' => 'Amine',
        ]);
    }
    #[Route('/product', name: 'app_product')]
    public function products(EntityManagerInterface $entityManager): Response
    {
        $products = $entityManager->getRepository(Product::class)->findAll();

        return $this->render('bezoeker/product.html.twig',[
            'products'=> $products,
        ]);
    }

    #[Route('/new/product', name: 'add_product')]
    public function newproduct(EntityManagerInterface $entityManager): Response
    {
        $product= new Product();
        $form= $this->createForm(ProductType::class, $product);
        return $this->render('bezoeker/new.html.twig', [
            'form'=>$form,
        ]);
    }

}
