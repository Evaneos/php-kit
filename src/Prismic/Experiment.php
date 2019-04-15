<?php

namespace Prismic;

use stdClass;
class Experiment
{
    /**
     * Experiment ID
     * @var string
     */
    private $id;
    /**
     * Google's Experiment ID
     * @var string
     */
    private $googleId;
    /**
     * Experiment Name/Label
     * @var string
     */
    private $name;
    /**
     * Prismic Variations/Releases
     * @var array
     */
    private $variations;
    private function __construct($id, $googleId = null, $name, array $variations)
    {
        $this->id = $id;
        $this->googleId = $googleId;
        $this->name = $name;
        $this->variations = $variations;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getGoogleId()
    {
        return $this->googleId;
    }
    public function getName()
    {
        return $this->name;
    }
    /**
     * @return Variation[]
     */
    public function getVariations()
    {
        return $this->variations;
    }
    public static function parse(stdClass $json)
    {
        $googleId = isset($json->googleId) ? $json->googleId : null;
        $vars = array_map(function ($varJson) {
            return Variation::parse($varJson);
        }, $json->variations);
        return new self($json->id, $googleId, $json->name, $vars);
    }
}