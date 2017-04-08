<?php

namespace UpdateBundle\Controller;

use UpdateBundle\Entity\ProductInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Productinfo controller.
 *
 */
class ProductInfoController extends Controller
{
    /**
     * Lists all productInfo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productInfos = $em->getRepository('UpdateBundle:ProductInfo')->findAll();

        return $this->render('productinfo/index.html.twig', array(
            'productInfos' => $productInfos,
        ));
    }

    /**
     * Creates a new productInfo entity.
     *
     */
    public function newAction(Request $request)
    {
        $productInfo = new Productinfo();
        $form = $this->createForm('UpdateBundle\Form\ProductInfoType', $productInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productInfo);
            $em->flush($productInfo);

            return $this->redirectToRoute('productinfo_show', array('id' => $productInfo->getId()));
        }

        return $this->render('productinfo/new.html.twig', array(
            'productInfo' => $productInfo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a productInfo entity.
     *
     */
    public function showAction(ProductInfo $productInfo)
    {
        $deleteForm = $this->createDeleteForm($productInfo);

        return $this->render('productinfo/show.html.twig', array(
            'productInfo' => $productInfo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing productInfo entity.
     *
     */
    public function editAction(Request $request, ProductInfo $productInfo)
    {
        $deleteForm = $this->createDeleteForm($productInfo);
        $editForm = $this->createForm('UpdateBundle\Form\ProductInfoType', $productInfo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('productinfo_edit', array('id' => $productInfo->getId()));
        }

        return $this->render('productinfo/edit.html.twig', array(
            'productInfo' => $productInfo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a productInfo entity.
     *
     */
    public function deleteAction(Request $request, ProductInfo $productInfo)
    {
        $form = $this->createDeleteForm($productInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productInfo);
            $em->flush();
        }

        return $this->redirectToRoute('productinfo_index');
    }

    /**
     * Creates a form to delete a productInfo entity.
     *
     * @param ProductInfo $productInfo The productInfo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductInfo $productInfo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productinfo_delete', array('id' => $productInfo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
