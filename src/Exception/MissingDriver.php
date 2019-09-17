<?php

namespace Interop\Template\Universal\Exception;

use Interop\Template\Exception\TemplateExceptionInterface;
use InvalidArgumentException, Throwable;

final class MissingDriver extends InvalidArgumentException implements TemplateExceptionInterface
{
    public static function create(string $engineClass, string $packageName, int $code = 0, Throwable $previous = null): MissingDriver
    {
        return new static("Engine class '$engineClass' not found, please install package '$packageName'.", $code, $previous);
    }
}
