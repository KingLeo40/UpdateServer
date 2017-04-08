<?php

namespace UpdateBundle\Controller;

use UpdateBundle\Entity\DeviceInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Deviceinfo controller.
 *
 */
class DeviceInfoController extends Controller
{
    /**
     * Lists all deviceInfo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $deviceInfos = $em->getRepository('UpdateBundle:DeviceInfo')->findAll();

        return $this->render('deviceinfo/index.html.twig', array(
            'deviceInfos' => $deviceInfos,
        ));
    }

    /**
     * Finds and displays a deviceInfo entity.
     *
     */
    public function showAction(DeviceInfo $deviceInfo)
    {

        return $this->render('deviceinfo/show.html.twig', array(
            'deviceInfo' => $deviceInfo,
        ));
    }
}
