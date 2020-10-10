<?php

declare(strict_types = 1);

use function Folded\getCsvRowFromFile;

afterEach(function (): void {
    $filePath = __DIR__ . "/misc/file.csv";

    if (file_exists($filePath)) {
        $deleted = unlink($filePath);

        if ($deleted === false) {
            throw new Exception("could not delete file $filePath");
        }
    }
});

it("should get the first CSV row from the file", function (): void {
    $filePath = __DIR__ . "/misc/file.csv";
    $file = fopen($filePath, "w+");
    $row = ["foo", "bar"];

    if ($file === false) {
        throw new Exception("could not open file $filePath");
    }

    $written = fputcsv($file, $row);

    if ($written === false) {
        throw new Exception("could not write CSV row in file $filePath");
    }

    $closed = fclose($file);

    if ($closed === false) {
        throw new Exception("could not close file $filePath");
    }

    $file = fopen($filePath, "r");

    expect(getCsvRowFromFile($file))->toBe($row);
});

it("should throw an exception if the file is not a resource", function (): void {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage("Expected a resource. Got: string");

    getCsvRowFromFile("foo");
});
