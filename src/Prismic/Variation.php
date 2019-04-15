<?php

namespace Prismic;

use stdClass;
class Variation
{
    /**
     * Variation ID
     * @var string
     */
    private $id;
    /**
     * Variation Release Ref
     * @var string
     */
    private $ref;
    /**
     * Variation Label
     * @var string
     */
    private $label;
    private function __construct($id, $ref, $label)
    {
        $this->id = $id;
        $this->ref = $ref;
        $this->label = $label;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getRef()
    {
        return $this->ref;
    }
    public function getLabel()
    {
        return $this->label;
    }
    public static function parse(stdClass $json)
    {
        return new Variation($json->id, $json->ref, $json->label);
    }
}