<?php

declare(strict_types = 1);

namespace Folded;

use Exception;
use Webmozart\Assert\Assert;

if (!function_exists("Folded\getCsvRowFromFile")) {
    /**
     * Get a CSV row from a CSV file.
     *
     * @param resource $handle     The opened file (in read mode).
     * @param int      $length     The number of characters to read from the row.
     * @param string   $delimiter  The delimiter to use to parse the row.
     * @param string   $enclosure  The character to use to delimit cells.
     * @param string   $escapeChar The character to use to escape special characters.
     *
     * @throws Exception if the file handler is not a valid resource.
     * @throws Exception If an error occured while reading the file.
     *
     * @return array<string>
     *
     * @since 0.1.0
     *
     * @example
     * $file = fopen("path/to/file", "r");
     *
     * $row = getCsvRowFromFile($file);
     */
    function getCsvRowFromFile($handle, int $length = 0, string $delimiter = ",", string $enclosure = '"', string $escapeChar = "\\"): array
    {
        Assert::resource($handle);

        $row = fgetcsv($handle, $length, $delimiter, $enclosure, $escapeChar);

        if ($row === null) {
            throw new Exception("invalid file handler provided");
        }

        if ($row === false) {
            throw new Exception("unable to get the CSV row");
        }

        return $row;
    }
}
