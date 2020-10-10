<?php

declare(strict_types = 1);

namespace Folded;

use Exception;

if (!function_exists("Folded\addCsvRowToFile")) {
    /**
     * Adds a array representing a CSV row to a file.
     *
     * @param resource      $handle     The opened file (with the write mode).
     * @param array<string> $fields     An array of strings representing the CSV row.
     * @param string        $delimiter  The delimiter to use when writing the cell values.
     * @param string        $enclosure  The character to use to delimit cells.
     * @param string        $escapeChar The character to use to escape special characters.
     *
     * @throws Exception If an error occured while writing in the file.
     *
     * @since 0.1.0
     *
     * @example
     * $file = fopen("path/to/file", "w");
     *
     * addCsvRowToFile($file, ["foo", "bar"]);
     */
    function addCsvRowToFile($handle, array $fields, string $delimiter = ",", string $enclosure = '"', string $escapeChar = "\\"): void
    {
        $written = fputcsv($handle, $fields, $delimiter, $enclosure, $escapeChar);

        if ($written === false) {
            throw new Exception("could not put CSV row to file");
        }
    }
}
