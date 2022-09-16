<?php

namespace Wcs\Municipality;

class Municipality
{

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $otherLanguageName;

    /**
     * @var string|null
     */
    protected $province;

    /**
     * @var string|null
     */
    protected $provinceCode;

    /**
     * @var string|null
     */
    private $slug;

    /**
     * @param array $definition
     */
    public function __construct(array $definition)
    {
        $this->name = $definition['name'];
        $this->otherLanguageName = $definition['other_language_name'];
        $this->province = $definition['province'];
        $this->provinceCode = $definition['province_code'];
        $this->slug = $definition['slug'];
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getOtherLanguageName()
    {
        return $this->otherLanguageName;
    }

    /**
     * @return string|null
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @return string|null
     */
    public function getProvinceCode()
    {
        return $this->provinceCode;
    }

    /**
     * @return string|null
     */
    public function getSlug()
    {
        return $this->slug;
    }

}