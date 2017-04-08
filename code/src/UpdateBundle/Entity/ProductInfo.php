<?php

namespace UpdateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductInfo
 */
class ProductInfo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $globalConfig;

    /**
     * @var string
     */
    private $updateConfig;


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
     * Set name
     *
     * @param string $name
     * @return ProductInfo
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set globalConfig
     *
     * @param string $globalConfig
     * @return ProductInfo
     */
    public function setGlobalConfig($globalConfig)
    {
        $this->globalConfig = $globalConfig;

        return $this;
    }

    /**
     * Get globalConfig
     *
     * @return string 
     */
    public function getGlobalConfig()
    {
        return $this->globalConfig;
    }

    /**
     * Set updateConfig
     *
     * @param string $updateConfig
     * @return ProductInfo
     */
    public function setUpdateConfig($updateConfig)
    {
        $this->updateConfig = $updateConfig;

        return $this;
    }

    /**
     * Get updateConfig
     *
     * @return string 
     */
    public function getUpdateConfig()
    {
        return $this->updateConfig;
    }
}
