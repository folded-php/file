<?php

declare(strict_types = 1);

namespace Folded;

use Exception;

if (!function_exists("Folded\closeFile")) {
    /**
     * Closes the file.
     *
     * @param resource $handle The opened file.
     *
     * @throws Exception If the file could not be closed.
     *
     * @since 0.1.0
     *
     * @example
     * $file = fopen("path/to/file", "r");
     *
     * closeFile($file);
     */
    function closeFile($handle): void
    {
        $closed = fclose($handle);

        if ($closed === false) {
            throw new Exception("could not close file");
        }
    }
}
