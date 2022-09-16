<?php

namespace Wcs\Municipality;

class MunicipalityRepository
{

    /**
     * @var array
     */
    private $definitions;

    /**
     * @var string|null
     */
    private $definitionPath;

    /**
     * @param $definitionPath
     */
    public function __construct($definitionPath = null)
    {
        $this->definitionPath = $definitionPath ?: __DIR__ . '/../../';
    }

    protected function loadDefinitions()
    {
        $filename = $this->definitionPath . 'data.json';
        if ($rawDefinition = @file_get_contents($filename)) {
            return json_decode($rawDefinition, true);
        }

        return [];
    }

    public function getAll()
    {
        $definitions = $this->loadDefinitions();
        foreach ($definitions as $definition) {
            $this->definitions[] = $this->createMunicipalityFromDefinitions($definition);
        }
    }

    protected function createMunicipalityFromDefinitions($definition)
    {
        return new Municipality([
            'name' => $definition['Denominazione in italiano'],
            'other_language_name' => $definition['Denominazione altra lingua'],
            'province' => $definition['Denominazione dell\'Unit\u00e0 territoriale sovracomunale \n(valida a fini statistici)'],
            'province_code' => $definition['Sigla automobilistica'],
        ]);
    }

}