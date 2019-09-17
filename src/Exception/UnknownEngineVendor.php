<?php

namespace Interop\Template\Universal\Exception;

use Interop\Template\Exception\TemplateExceptionInterface;
use InvalidArgumentException, Throwable;

final class UnknownEngineVendor extends InvalidArgumentException implements TemplateExceptionInterface
{
    public static function fromName(string $engineName, int $code = 0, Throwable $previous = null): UnknownEngineVendor
    {
        return new static("Template engine '$engineName' is unknown.", $code, $previous);
    }
}
