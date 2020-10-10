<?php

declare(strict_types = 1);

namespace Folded;

use Exception;
use Webmozart\Assert\Assert;

if (!function_exists("Folded\deleteFile")) {
    /**
     * Deletes a file.
     *
     * @param string   $path The path to the file.
     * @param resource $context  A stream context.
     *
     * @throws Exception If the file could not be deleted.
     *
     * @since 0.1.0
     *
     * @example
     * deleteFile("path/to/file");
     */
    function deleteFile(string $path, $context = null): void
    {
        if ($context !== null) {
            Assert::resource($context);
        }

        $deleted = unlink($path, $context ?? stream_context_create());

        if ($deleted === false) {
            throw new Exception("could not delete file $path");
        }
    }
}
