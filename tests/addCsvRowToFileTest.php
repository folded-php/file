<?php

declare(strict_types = 1);

use function Folded\addCsvRowToFile;

function removeFiles(): void
{
    $filePath = __DIR__ . "/misc/file.csv";

    if (file_exists($filePath)) {
        $deleted = unlink($filePath);

        if ($deleted === false) {
            throw new Exception("could not delete file $filePath");
        }
    }
}

beforeEach(fn () => removeFiles());

afterEach(fn () => removeFiles());

it("should add the row to the CSV file", function (): void {
    $filePath = __DIR__ . "/misc/file.csv";
    $file = fopen($filePath, "w");

    addCsvRowToFile($file, ["foo", "bar"]);

    expect(file_get_contents($filePath))->toBe("foo,bar\n");
});
