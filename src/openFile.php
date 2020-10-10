<?php

declare(strict_types = 1);

namespace Folded;

use Exception;
use Webmozart\Assert\Assert;

if (!function_exists("Folded\openFile")) {
    /**
     * Open the file and returns the resource.
     *
     * @param string   $path           The path to the file.
     * @param string   $mode           The opening mode.
     * @param bool     $useIncludePath Find the file in the include path configured in your "php.ini".
     * @param resource $context
     *
     * @throws Exception If the file could not be opened.
     *
     * @return resource
     *
     * @since 0.1.0
     * @see https://www.php.net/manual/fr/function.fopen.php For a list of opening mode.
     *
     * @example
     * openFile("path/to/file", "r");
     */
    function openFile(string $path, string $mode, bool $useIncludePath = false, $context = null)
    {
        if ($context !== null) {
            Assert::resource($context);
        }

        $file = fopen($path, $mode, $useIncludePath, $context ?? stream_context_create());

        if ($file === false) {
            throw new Exception("could not open file $path");
        }

        return $file;
    }
}
