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
     * @param array $definition
     */
    public function __construct(array $definition)
    {
        $this->name = $definition['name'];
        $this->otherLanguageName = $definition['other_language_name'];
        $this->province = $definition['province'];
        $this->provinceCode = $definition['province_code'];
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getOtherLanguageName(): ?string
    {
        return $this->otherLanguageName;
    }

    /**
     * @return string|null
     */
    public function getProvince(): ?string
    {
        return $this->province;
    }

    /**
     * @return string|null
     */
    public function getProvinceCode(): ?string
    {
        return $this->provinceCode;
    }
}
