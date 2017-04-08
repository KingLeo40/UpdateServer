<?php

namespace UpdateBundle\Controller;

use UpdateBundle\Entity\UpdateConfig;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Updateconfig controller.
 *
 */
class UpdateConfigController extends Controller
{
    /**
     * Lists all updateConfig entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $updateConfigs = $em->getRepository('UpdateBundle:UpdateConfig')->findAll();

        return $this->render('updateconfig/index.html.twig', array(
            'updateConfigs' => $updateConfigs,
        ));
    }

    /**
     * Creates a new updateConfig entity.
     *
     */
    public function newAction(Request $request)
    {
        $updateConfig = new Updateconfig();
        $form = $this->createForm('UpdateBundle\Form\UpdateConfigType', $updateConfig);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($updateConfig);
            $em->flush($updateConfig);

            return $this->redirectToRoute('updateconfig_show', array('id' => $updateConfig->getId()));
        }

        return $this->render('updateconfig/new.html.twig', array(
            'updateConfig' => $updateConfig,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a updateConfig entity.
     *
     */
    public function showAction(UpdateConfig $updateConfig)
    {
        $deleteForm = $this->createDeleteForm($updateConfig);

        return $this->render('updateconfig/show.html.twig', array(
            'updateConfig' => $updateConfig,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing updateConfig entity.
     *
     */
    public function editAction(Request $request, UpdateConfig $updateConfig)
    {
        $deleteForm = $this->createDeleteForm($updateConfig);
        $editForm = $this->createForm('UpdateBundle\Form\UpdateConfigType', $updateConfig);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('updateconfig_edit', array('id' => $updateConfig->getId()));
        }

        return $this->render('updateconfig/edit.html.twig', array(
            'updateConfig' => $updateConfig,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a updateConfig entity.
     *
     */
    public function deleteAction(Request $request, UpdateConfig $updateConfig)
    {
        $form = $this->createDeleteForm($updateConfig);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($updateConfig);
            $em->flush();
        }

        return $this->redirectToRoute('updateconfig_index');
    }

    /**
     * Creates a form to delete a updateConfig entity.
     *
     * @param UpdateConfig $updateConfig The updateConfig entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UpdateConfig $updateConfig)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('updateconfig_delete', array('id' => $updateConfig->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
