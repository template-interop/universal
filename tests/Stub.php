<?php

namespace Interop\Tests\Template\Universal;

use Interop\Template\TemplateEngineInterface;

final class Stub
{
    public static function engine(string $className): TemplateEngineInterface
    {
        eval("final class $className implements TemplateEngineInterface {public function render(string \$templateName, array \$parameters = []): string {return '';}}");

        return new $className;
    }
}
