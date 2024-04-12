<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function newproduct(EntityManagerInterface $entityManager, Request $request): Response
    {
        $product= new Product();
        $form= $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $entityManager->persist($product);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Your changes were saved!'
            );
            return $this->redirectToRoute('app_product');

        }
        return $this->render('bezoeker/new.html.twig', [
            'form'=>$form,
        ]);
    }

    #[Route('/product/delete/{id}', name: 'product_delete')]
    public function delete(EntityManagerInterface $entityManager, int $id): Response
    {
        $product = $entityManager->getRepository(Product::class)->find($id);
        $entityManager->remove($product);
        $entityManager->flush();
        return $this->redirectToRoute('app_product', [
            'id' => $product->getId() ]);

    }
    #[Route('/update/product/{id}', name: 'update_product')]
    public function update(EntityManagerInterface $entityManager, Request $request, int $id): Response
    {
        $product= $entityManager->getRepository(Product::class)->find($id);
        $form= $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $entityManager->persist($product);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'updated!'
            );
            return $this->redirectToRoute('app_product');

        }
        return $this->render('bezoeker/new.html.twig', [
            'form'=>$form,
        ]);
    }



}

