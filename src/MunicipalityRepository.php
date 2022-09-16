<?php

namespace Wcs\Municipality;

class MunicipalityRepository
{
    /**
     * @var Municipality[]
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
        $this->definitionPath = $definitionPath ?: __DIR__ . '/../';
    }

    /**
     * @return array
     */
    protected function loadDefinitions()
    {
        $filename = $this->definitionPath . 'data.json';
        if ($rawDefinition = @file_get_contents($filename)) {
            return json_decode($rawDefinition, true);
        }

        return [];
    }

    /**
     * @return Municipality[]
     */
    public function getAll()
    {
        $definitions = $this->loadDefinitions();
        foreach ($definitions as $definition) {
            $keys = array_map(function ($v) {
                return str_replace("\n", "", $v);
            }, array_keys($definition));

            $values = array_values($definition);

            $this->definitions[] = $this->createMunicipalityFromDefinitions(array_combine($keys, $values));
        }

        return $this->definitions;
    }

    /**
     * @param string $name
     * @return Municipality|null
     */
    public function getSingle(string $name) {
        $this->getAll();
        foreach ($this->getAll() as $definition) {
            if ($name == $definition->getName()) {
                return $definition;
            }
        }
        return null;
    }

    /**
     * @param $definition
     * @return Municipality
     */
    protected function createMunicipalityFromDefinitions($definition)
    {
        return new Municipality([
            'name' => $definition['Denominazione in italiano'],
            'other_language_name' => $definition['Denominazione altra lingua'],
            'province' => $definition['Denominazione dell\'Unità territoriale sovracomunale (valida a fini statistici)'],
            'province_code' => $definition['Sigla automobilistica'],
        ]);
    }
}
