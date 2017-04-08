<?php

namespace UpdateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeviceInfo
 */
class DeviceInfo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $productName;

    /**
     * @var string
     */
    private $channel;

    /**
     * @var string
     */
    private $appVersion;

    /**
     * @var string
     */
    private $innerVersion;

    /**
     * @var string
     */
    private $localVersion;

    /**
     * @var string
     */
    private $osVersion;

    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $device;

    /**
     * @var string
     */
    private $memory;

    /**
     * @var string
     */
    private $screenSize;

    /**
     * @var string
     */
    private $netState;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $language;

    /**
     * @var string
     */
    private $processInfo;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set uuid
     *
     * @param string $uuid
     * @return DeviceInfo
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid
     *
     * @return string 
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set productName
     *
     * @param string $productName
     * @return DeviceInfo
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set channel
     *
     * @param string $channel
     * @return DeviceInfo
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return string 
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set appVersion
     *
     * @param string $appVersion
     * @return DeviceInfo
     */
    public function setAppVersion($appVersion)
    {
        $this->appVersion = $appVersion;

        return $this;
    }

    /**
     * Get appVersion
     *
     * @return string 
     */
    public function getAppVersion()
    {
        return $this->appVersion;
    }

    /**
     * Set innerVersion
     *
     * @param string $innerVersion
     * @return DeviceInfo
     */
    public function setInnerVersion($innerVersion)
    {
        $this->innerVersion = $innerVersion;

        return $this;
    }

    /**
     * Get innerVersion
     *
     * @return string 
     */
    public function getInnerVersion()
    {
        return $this->innerVersion;
    }

    /**
     * Set localVersion
     *
     * @param string $localVersion
     * @return DeviceInfo
     */
    public function setLocalVersion($localVersion)
    {
        $this->localVersion = $localVersion;

        return $this;
    }

    /**
     * Get localVersion
     *
     * @return string 
     */
    public function getLocalVersion()
    {
        return $this->localVersion;
    }

    /**
     * Set osVersion
     *
     * @param string $osVersion
     * @return DeviceInfo
     */
    public function setOsVersion($osVersion)
    {
        $this->osVersion = $osVersion;

        return $this;
    }

    /**
     * Get osVersion
     *
     * @return string 
     */
    public function getOsVersion()
    {
        return $this->osVersion;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return DeviceInfo
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set device
     *
     * @param string $device
     * @return DeviceInfo
     */
    public function setDevice($device)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Get device
     *
     * @return string 
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * Set memory
     *
     * @param string $memory
     * @return DeviceInfo
     */
    public function setMemory($memory)
    {
        $this->memory = $memory;

        return $this;
    }

    /**
     * Get memory
     *
     * @return string 
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * Set screenSize
     *
     * @param string $screenSize
     * @return DeviceInfo
     */
    public function setScreenSize($screenSize)
    {
        $this->screenSize = $screenSize;

        return $this;
    }

    /**
     * Get screenSize
     *
     * @return string 
     */
    public function getScreenSize()
    {
        return $this->screenSize;
    }

    /**
     * Set netState
     *
     * @param string $netState
     * @return DeviceInfo
     */
    public function setNetState($netState)
    {
        $this->netState = $netState;

        return $this;
    }

    /**
     * Get netState
     *
     * @return string 
     */
    public function getNetState()
    {
        return $this->netState;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return DeviceInfo
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return DeviceInfo
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set processInfo
     *
     * @param string $processInfo
     * @return DeviceInfo
     */
    public function setProcessInfo($processInfo)
    {
        $this->processInfo = $processInfo;

        return $this;
    }

    /**
     * Get processInfo
     *
     * @return string
     */
    public function getProcessInfo()
    {
        return $this->processInfo;
    }

}
