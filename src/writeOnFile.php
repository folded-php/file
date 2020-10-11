<?php

declare(strict_types = 1);

namespace Folded;

use Exception;
use Webmozart\Assert\Assert;

if (!function_exists("Folded\writeOnFile")) {
    /**
     * Write a string on the file.
     *
     * @param resource $handle The opened file (in write mode).
     * @param string   $string The string to write on the file.
     * @param int      $length The length of the string to write (default: null).
     *
     * @throws Exception If the file could not be written.
     *
     * @since 0.2.0
     *
     * @example
     * $file = fopen("path/to/file.txt", "w");
     *
     * writeOnFile($file, "foo");
     */
    function writeOnFile($handle, string $string, ?int $length = null): int
    {
        Assert::resource($handle);

        $numberOfBytesWritten = fwrite($handle, $string, $length ?? mb_strlen($string));

        if ($numberOfBytesWritten === false) {
            throw new Exception("could not write in file");
        }

        return $numberOfBytesWritten;
    }
}
