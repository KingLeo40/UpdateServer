<?php

namespace UpdateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UpdateInfo
 */
class UpdateInfo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $appVersion;

    /**
     * @var string
     */
    private $channel;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $status;

    /**
     * @var bool
     */
    private $forceExec;

    /**
     * @var bool
     */
    private $needRestart;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $resVersion;

    /**
     * @var string
     */
    private $resourceUrl;

    /**
     * @var string
     */
    private $resourceSuffix;

    /**
     * @var string
     */
    private $resourceMd5;

    /**
     * @var string
     */
    private $resourceSize;


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
     * Set version
     *
     * @param string $appVersion
     * @return UpdateInfo
     */
    public function setAppVersion($appVersion)
    {
        $this->appVersion = $appVersion;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getAppVersion()
    {
        return $this->appVersion;
    }

    /**
     * Set channel
     *
     * @param string $channel
     * @return UpdateInfo
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
     * Set type
     *
     * @param string $type
     * @return UpdateInfo
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param int $status
     * @return UpdateInfo
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set forceExec
     *
     * @param boolean $forceExec
     * @return UpdateInfo
     */
    public function setForceExec($forceExec)
    {
        $this->forceExec = $forceExec;

        return $this;
    }

    /**
     * Get forceExec
     *
     * @return boolean 
     */
    public function getForceExec()
    {
        return $this->forceExec;
    }


    /**
     * Set needRestart
     *
     * @param boolean $needRestart
     * @return UpdateInfo
     */
    public function setNeedRestart($needRestart)
    {
        $this->needRestart = $needRestart;

        return $this;
    }

    /**
     * Get needRestart
     *
     * @return boolean
     */
    public function getNeedRestart()
    {
        return $this->needRestart;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return UpdateInfo
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set resVersion
     *
     * @param string $resVersion
     * @return UpdateInfo
     */
    public function setResVersion($resVersion)
    {
        $this->resVersion = $resVersion;

        return $this;
    }

    /**
     * Get resVersion
     *
     * @return string 
     */
    public function getResVersion()
    {
        return $this->resVersion;
    }

    /**
     * Set resourceUrl
     *
     * @param string $resourceUrl
     * @return UpdateInfo
     */
    public function setResourceUrl($resourceUrl)
    {
        $this->resourceUrl = $resourceUrl;

        return $this;
    }

    /**
     * Get resourceUrl
     *
     * @return string 
     */
    public function getResourceUrl()
    {
        return $this->resourceUrl;
    }

    /**
     * Set resourceSuffix
     *
     * @param string $resourceSuffix
     * @return UpdateInfo
     */
    public function setResourceSuffix($resourceSuffix)
    {
        $this->resourceSuffix = $resourceSuffix;

        return $this;
    }

    /**
     * Get resourceSuffix
     *
     * @return string 
     */
    public function getResourceSuffix()
    {
        return $this->resourceSuffix;
    }

    /**
     * Set resourceMd5
     *
     * @param string $resourceMd5
     * @return UpdateInfo
     */
    public function setResourceMd5($resourceMd5)
    {
        $this->resourceMd5 = $resourceMd5;

        return $this;
    }

    /**
     * Get resourceMd5
     *
     * @return string 
     */
    public function getResourceMd5()
    {
        return $this->resourceMd5;
    }

    /**
     * Set resourceSize
     *
     * @param string $resourceSize
     * @return UpdateInfo
     */
    public function setResourceSize($resourceSize)
    {
        $this->resourceSize = $resourceSize;

        return $this;
    }

    /**
     * Get resourceSize
     *
     * @return string 
     */
    public function getResourceSize()
    {
        return $this->resourceSize;
    }
}
