<?php

namespace Interop\Template\Universal;

use Interop\Template\Universal\UniversalFactory;
use Interop\Template\Universal\Exception\MissingDriver;
use Interop\Template\Universal\Exception\UnknownEngineVendor;
use Interop\Template\TemplateEngineInterface;
use PHPUnit\Framework\TestCase;

final class UniversalFactoryTest extends TestCase
{
    /**
     * @param object $vendorEngine
     * @param string $interopClass
     * @dataProvider data
     */
    public function testCreate($vendorEngine, $interopClass)
    {
        $factory = new UniversalFactory;
        $engine = $factory->create($vendorEngine);
        $this->assertInstanceOf($engine, TemplateEngineInterface::class);
        $this->assertInstanceOf($engine, $interopClass);
    }

    public function testMissingDriver()
    {
        $factory = new UniversalFactory;
        $this->expectException(UnknownEngineVendor::class);
        $factory->create(new \stdClass);
    }

    public function data()
    {
        return [
            ['Twig\Environment', 'Interop\Template\Twig\TwigEngine'],
        ];
    }
}
