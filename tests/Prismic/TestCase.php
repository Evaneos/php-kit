<?php

namespace Prismic\Test;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    public function getJsonFixture($fileName)
    {
        $file = sprintf('%s/../fixtures/%s', __DIR__, $fileName);
        if (!\file_exists($file)) {
            throw new \RuntimeException(sprintf('The JSON Fixture %s does not exist on disk', $fileName));
        }
        return \file_get_contents($file);
    }
}