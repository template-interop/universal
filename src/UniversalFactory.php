<?php

namespace Interop\Template\Universal;

use Interop\Template\Universal\Exception\MissingDriver;
use Interop\Template\Universal\Exception\UnknownEngineVendor;
use Interop\Template\TemplateEngineInterface;
use Interop\Template\Twig\TwigEngine;
use Interop\Template\Latte\LatteEngine;
use Interop\Template\Plates\PlatesEngine;
use Interop\Template\Dwoo\DwooEngine;
use Interop\Template\Smarty\SmartyEngine;

use Twig\Environment as Twig;
use Latte\Engine as Latte;
use League\Plates\Engine as Plates;
use Dwoo\Core as Dwoo;
use Smarty;

final class UniversalFactory
{
    /** @var array */
    private $knowDrivers = ['twig', 'latte', 'plates', 'dwoo', 'smarty', 'mustache'];

    public function create($engine, string $suffix = null): TemplateEngineInterface
    {
        if ($engine instanceof Twig) {
            if (!class_exists(TwigEngine::class)) {
                throw MissingDriver::create(TwigEngine::class, 'template-interop/twig-adapter');
            }

            return $suffix === null ? new TwigEngine($engine) :  new TwigEngine($engine, $suffix);
        }

        if ($engine instanceof Latte) {
            if (!class_exists(LatteEngine::class)) {
                throw MissingDriver::create(LatteEngine::class, 'template-interop/latte-adapter');
            }

            return $suffix === null ? new LatteEngine($engine) :  new LatteEngine($engine, $suffix);
        }

        if ($engine instanceof Plates) {
            if (!class_exists(PlatesEngine::class)) {
                throw MissingDriver::create(PLatesEngine::class, 'template-interop/plates-adapter');
            }

            return $suffix === null ? new PlatesEngine($engine) :  new PlatesEngine($engine, $suffix);
        }

        if ($engine instanceof Dwoo) {
            if (!class_exists(PlatesDwooEngine::class)) {
                throw MissingDriver::create(DwooEngine::class, 'template-interop/dwoo-adapter');
            }

            return $suffix === null ? new DwooEngine($engine) :  new DwooEngine($engine, $suffix);
        }

        if ($engine instanceof Smarty) {
            if (!class_exists(SmartyEngine::class)) {
                throw MissingDriver::create(SmartyEngine::class, 'template-interop/smarty-adapter');
            }

            return $suffix === null ? new SmartyEngine($engine) :  new SmartyEngine($engine, $suffix);
        }

        throw new UnknownEngineVendor;
    }

    public function register(): void
    {

    }
}
