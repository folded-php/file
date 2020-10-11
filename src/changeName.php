<?php

declare(strict_types = 1);

namespace Folded;

use Exception;
use Webmozart\Assert\Assert;

if (!function_exists("Folded\changeName")) {
    /**
     * Renames a file.
     *
     * @param string   $oldPath The old path to the file.
     * @param string   $newPath The new path to the file.
     * @param resource $context An additional stream context.
     *
     * @throws Exception If an erorr occured while renaming.
     *
     * @since 0.2.0
     *
     * @example
     * changeName("path/to/old.txt", "path/to/new.txt");
     */
    function changeName(string $oldPath, string $newPath, $context = null): void
    {
        if ($context !== null) {
            Assert::resource($context);
        }

        $renamed = rename($oldPath, $newPath);

        if ($renamed === false) {
            throw new Exception("could not rename file $oldPath to $newPath");
        }
    }
}
