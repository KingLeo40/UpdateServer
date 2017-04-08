<?php

namespace UpdateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UpdateConfig
 */
class UpdateConfig
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
     * @var int
     */
    private $status;

    /**
     * @var string
     */
    private $redirect;

    /**
     * @var string
     */
    private $limitInfo;

    /**
     * @var boolean
     */
    private $showTip;

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
     * @return UpdateConfig
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
     * @return UpdateConfig
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
     * Set status
     *
     * @param int $status
     * @return UpdateConfig
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
     * Set redirect
     *
     * @param string $redirect
     * @return UpdateConfig
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;

        return $this;
    }

    /**
     * Get redirect
     *
     * @return string 
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * Set limitInfo
     *
     * @param string $limitInfo
     * @return UpdateConfig
     */
    public function setLimitInfo($limitInfo)
    {
        $this->limitInfo = $limitInfo;

        return $this;
    }

    /**
     * Get limitInfo
     *
     * @return string
     */
    public function getLimitInfo()
    {
        return $this->limitInfo;
    }

    /**
     * Set showTip
     *
     * @param boolean $showTip
     * @return UpdateConfig
     */
    public function setShowTip($showTip)
    {
        $this->showTip = $showTip;

        return $this;
    }

    /**
     * Get showTip
     *
     * @return boolean
     */
    public function getShowTip()
    {
        return $this->showTip;
    }
}
