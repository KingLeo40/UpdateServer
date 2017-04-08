<?php

namespace UpdateBundle\Controller;

use UpdateBundle\Entity\DeviceInfo;
use UpdateBundle\Entity\UpdateInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Updateinfo controller.
 *
 */
class UpdateInfoController extends Controller
{

    static $CHANNEL_ALL = "all";
    /**
     *  updateInfo getUpdateInfo
     *http://localhost/UpdateWebServer/code/web/app_dev.php/updateinfo/getUpdateInfo?uuid=1&productName=test&channel=test&appVersion=1.0.1&innerVersion=1&localVersion=1&osVersion=win&model=888&device=rr&memory=1080&screenSize=1080*720&netState=g&country=ch&language=zh&pInfo=l
     */
    public function getUpdateInfoAction(Request $request)
    {
        /*
        if($this->checkRefeshFrequently(1))
        {
            exit('You are refreshing too quickly, please wait a few seconds and try again.');
        }
        */

        $data          = array();
        $keys          = array
        (
            'uuid','productName','channel','appVersion','innerVersion',
            'localVersion','osVersion','model','device','memory','screenSize',
            'netState','country','language','pInfo'
        );

        $valid = true;
        $loseKey = "";
        foreach ($keys as $key)
        {
            $data[$key] =  $request->query->get($key);
            if($data[$key] == null)
            {
                $loseKey = $key;
                $valid = false;
            }
        }


        if(!$valid)
        {
            $updateState  = new UpdateVersionInfo(0,-1,"missing parameters $loseKey");

            $jsonResponse = JsonResponse::create($updateState, 200);

            return $jsonResponse;
        }

        $em = $this->getDoctrine()->getManager();

        $uuid          = $data['uuid'];
        $productName   = $data['productName'];
        $channel       = $data['channel'];
        $appVersion    = $data['appVersion'];
        $innerVersion  = $data['innerVersion'];
        $localVersion  = $data['localVersion'];
        $osVersion     = $data['osVersion'];
        $model         = $data['model'];
        $device        = $data['device'];
        $memory        = $data['memory'];
        $screenSize    = $data['screenSize'];
        $netState      = $data['netState'];
        $country       = $data['country'];
        $language      = $data['language'];
        $pInfo         = $data['pInfo'];

        $repository        = $em->getRepository('UpdateBundle:DeviceInfo');
        $queryb            = $repository->createQueryBuilder('d');
        $queryb->where('d.uuid=:uuid');
        $queryb->setParameter('uuid',$uuid);
        $query             = $queryb->getQuery();
        $deviceInfos       = $query->getResult();

        if(count($deviceInfos) > 0 && $deviceInfos[0])
        {
            $deviceInfo    = $deviceInfos[0];
        }
        else
        {
            $deviceInfo    = new DeviceInfo();
            $em->persist($deviceInfo);
        }

        $deviceInfo->setUuid($uuid);
        $deviceInfo->setProductName($productName);
        $deviceInfo->setChannel($channel);
        $deviceInfo->setAppVersion($appVersion);
        $deviceInfo->setInnerVersion($innerVersion);
        $deviceInfo->setLocalVersion($localVersion);
        $deviceInfo->setOsVersion($osVersion);
        $deviceInfo->setModel($model);
        $deviceInfo->setDevice($device);
        $deviceInfo->setMemory($memory);
        $deviceInfo->setScreenSize($screenSize);
        $deviceInfo->setNetState($netState);
        $deviceInfo->setCountry($country);
        $deviceInfo->setLanguage($language);
        $deviceInfo->setProcessInfo($pInfo);

        $em->flush();

        $status            = 0;
        $limitInfo         = '0';
        $showTip           = true;

        $productInfos = $em->getRepository('UpdateBundle:ProductInfo')->findBy(array('name'=>$productName));
        if(count($productInfos) > 0 && $productInfos[0] != null)
        {
            $configTable  = $productInfos[0]->getGlobalConfig();
            $updateTable  = $productInfos[0]->getUpdateConfig();

            $configName   = 'UpdateBundle:UpdateConfig';

            $configFields = array
            (
                "id","appVersion","channel","status","redirect","limitInfo","showTip"
            );

            $configColumns = array
            (
                "id","app_version","channel","status","redirect","limit_info","show_tip"
            );

            $whereSql = "app_version='$appVersion' and channel='$channel'";

            $configResults = $this->queryNative($em,$configName,$configColumns,$configFields,$configTable,$whereSql);
            if(count($configResults) > 0 && $configResults[0] != null)
            {
                $configResult = $configResults[0];
                $status       = $configResult->getStatus();
                $redirect     = $configResult->getRedirect();
                $limitInfo    = $configResult->getLimitInfo();
                $showTip      = $configResult->getShowTip();

                if(!empty($redirect))
                {
                    $appVersion         = $redirect;
                    $whereRedirectSql   = "app_version='$appVersion' and channel='$channel'";
                    $configResults = $this->queryNative($em,$configName,$configColumns,$configFields,$configTable,$whereRedirectSql);
                    if(count($configResults) > 0 && $configResults[0] != null)
                    {
                        $configResult = $configResults[0];
                        $status       = $configResult->getStatus();
                        $limitInfo    = $configResult->getLimitInfo();
                        $showTip      = $configResult->getShowTip();
                    }
                    else
                    {
                        $channel       = self::$CHANNEL_ALL;
                        $whereAllSql   = "app_version='$appVersion' and channel='$channel'";
                        $configResults = $this->queryNative($em,$configName,$configColumns,$configFields,$configTable,$whereAllSql);
                        if(count($configResults) > 0 && $configResults[0] != null)
                        {
                            $configResult = $configResults[0];
                            $status       = $configResult->getStatus();
                            $limitInfo    = $configResult->getLimitInfo();
                            $showTip      = $configResult->getShowTip();
                        }
                    }
                }
            }
            else
            {
                $channel       = self::$CHANNEL_ALL;
                $whereAllSql   = "app_version='$appVersion' and channel='$channel'";
                $configResults = $this->queryNative($em,$configName,$configColumns,$configFields,$configTable,$whereAllSql);
                if(count($configResults) > 0 && $configResults[0] != null)
                {
                    $configResult = $configResults[0];
                    $status       = $configResult->getStatus();
                    $limitInfo    = $configResult->getLimitInfo();
                    $showTip      = $configResult->getShowTip();
                }
            }

            if($status != 0)
            {
                $updateName  = 'UpdateBundle:UpdateInfo';

                $updateColumns = array
                (
                    "id","app_version","channel","type","status","force_exec","need_restart","message",
                    "res_version","resource_url","resource_suffix","resource_md5","resource_size"
                );

                $updateFields = array
                (
                    "id","appVersion","channel","type","status","forceExec","needRestart","message",
                    "resVersion","resourceUrl","resourceSuffix","resourceMd5","resourceSize"
                );

                $whereUpdateSql = "app_version='$appVersion' and channel='$channel'";

                $updateResults  = $this->queryNative($em,$updateName,$updateColumns,$updateFields,$updateTable,$whereUpdateSql);

                if(count($updateResults) > 0)
                {
                    $updateFileInfoArr = array();
                    foreach ($updateResults as $updateResult)
                    {
                        $updateFileInfo = new UpdateFileInfo();
                        $type       = $updateResult->getType();
                        $status     = $updateResult->getStatus();
                        $forceExec  = $updateResult->getForceExec();
                        $needRestart = $updateResult->getNeedRestart();
                        $message    = $updateResult->getMessage();
                        $resVersion = $updateResult->getResVersion();
                        $resUrl     = $updateResult->getResourceUrl();
                        $resSuffix  = $updateResult->getResourceSuffix();
                        $resSize    = $updateResult->getResourceSize();
                        $resMd5     = $updateResult->getResourceMd5();

                        $relativeDir = "$type/$appVersion/$resVersion/$channel";
                        $fileName = "$productName-$channel-$resVersion.$resSuffix";

                        $updateFileInfo->type = $type;
                        $updateFileInfo->status = $status;
                        $updateFileInfo->forceExec = $forceExec;
                        $updateFileInfo->needRestart = $needRestart;
                        $updateFileInfo->message = $message;
                        $updateFileInfo->resVersion = $resVersion;
                        $updateFileInfo->resourceUrl = $resUrl;
                        $updateFileInfo->resourceSize = $resSize;
                        $updateFileInfo->relativeDir = $relativeDir;
                        $updateFileInfo->fileName = $fileName;
                        $updateFileInfo->md5 = $resMd5;

                        $updateFileInfoArr[] = $updateFileInfo;
                    }

                    $updateState  = new UpdateVersionInfo($status,0,"status open",$productName,$channel,$limitInfo,$showTip,$updateFileInfoArr);
                }
                else
                {
                    $status       = 0;
                    $updateState  = new UpdateVersionInfo($status,-1,"can not found version",$productName,$channel,$limitInfo,$showTip);
                }
            }
            else
            {
                $updateState  = new UpdateVersionInfo($status,0,"status closed",$productName,$channel,$limitInfo,$showTip);
            }
        }
        else
        {
            $status       = 0;
            $updateState  = new UpdateVersionInfo($status,-1,"can not found productName",$productName,$channel,$limitInfo,$showTip);
        }

        $jsonResponse = JsonResponse::create($updateState, 200);

        return $jsonResponse;

    }

    /**
     * Lists all updateInfo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $updateInfos = $em->getRepository('UpdateBundle:UpdateInfo')->findAll();

        return $this->render('updateinfo/index.html.twig', array(
            'updateInfos' => $updateInfos,
        ));
    }

    /**
     * Creates a new updateInfo entity.
     *
     */
    public function newAction(Request $request)
    {
        $updateInfo = new Updateinfo();
        $form       = $this->createForm('UpdateBundle\Form\UpdateInfoType', $updateInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($updateInfo);
            $em->flush($updateInfo);

            return $this->redirectToRoute('updateinfo_show', array('id' => $updateInfo->getId()));
        }

        return $this->render('updateinfo/new.html.twig', array(
            'updateInfo' => $updateInfo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a updateInfo entity.
     *
     */
    public function showAction(UpdateInfo $updateInfo)
    {
        $deleteForm = $this->createDeleteForm($updateInfo);

        return $this->render('updateinfo/show.html.twig', array(
            'updateInfo' => $updateInfo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing updateInfo entity.
     *
     */
    public function editAction(Request $request, UpdateInfo $updateInfo)
    {
        $deleteForm = $this->createDeleteForm($updateInfo);
        $editForm = $this->createForm('UpdateBundle\Form\UpdateInfoType', $updateInfo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('updateinfo_edit', array('id' => $updateInfo->getId()));
        }

        return $this->render('updateinfo/edit.html.twig', array(
            'updateInfo' => $updateInfo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a updateInfo entity.
     *
     */
    public function deleteAction(Request $request, UpdateInfo $updateInfo)
    {
        $form = $this->createDeleteForm($updateInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($updateInfo);
            $em->flush();
        }

        return $this->redirectToRoute('updateinfo_index');
    }

    /**
     * Creates a form to delete a updateInfo entity.
     *
     * @param UpdateInfo $updateInfo The updateInfo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UpdateInfo $updateInfo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('updateinfo_delete', array('id' => $updateInfo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    private function queryNative($em,$entityName,$columns,$fields,$table,$whereSql)
    {
        $rsm = new ResultSetMapping;
        $rsm->addEntityResult($entityName, 't');

        $fcount = count($columns);
        for($i = 0; $i < $fcount; $i++)
        {
            $rsm->addFieldResult('t',$columns[$i],$fields[$i]);
        }
        $sqlFieldStr  = implode(",",$columns);

        $sql          = "select $sqlFieldStr from $table where $whereSql";
  ;
        $query       = $em->createNativeQuery($sql,$rsm);
        $results     = $query->getResult();

        return $results;
    }

    public function checkRefeshFrequently($min_seconds_between_refreshes = 1)
    {
        if(array_key_exists('last_access', $_SESSION) && time() - $min_seconds_between_refreshes <= $_SESSION['last_access'])
        {
            return true;
        }
        $_SESSION['last_access'] = time();
        return false;
    }
}

class UpdateVersionInfo
{
    public $status;
    public $error;
    public $msg;
    public $productName;
    public $channel;
    public $limitInfo;
    public $showTip;
    public $resInfoArr;

    function __construct($status,$error,$msg,$productName= 'none',$channel = 'none',$limitInfo = '0',$showTip=true,$resInfoArr = array())
    {
        $this->status         = $status;
        $this->error          = $error;
        $this->msg            = $msg;
        $this->productName  = $productName;
        $this->channel       = $channel;
        $this->limitInfo     = $limitInfo;
        $this->showTip       = $showTip;
        $this->resInfoArr    = $resInfoArr;
    }

}

class UpdateFileInfo
{
    public $status;
    public $type;
    public $forceExec;
    public $needRestart;
    public $resVersion;
    public $message;
    public $resourceUrl;
    public $resourceSize;
    public $relativeDir;
    public $fileName;
    public $md5;
}

