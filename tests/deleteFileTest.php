<?php

declare(strict_types = 1);

use function Folded\deleteFile;

it("should delete the file", function (): void {
    $filePath = __DIR__ . "/misc/file.csv";
    $file = fopen($filePath, "a");

    if ($file === false) {
        throw new Exception("could not open file $filePath");
    }

    $closed = fclose($file);

    if ($closed === false) {
        throw new Exception("could not deleted file $filePath");
    }

    deleteFile($filePath);

    expect(file_exists($filePath))->toBeFalse();
});

it("should throw an exception if the context is not a resource", function (): void {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage("Expected a resource. Got: string");

    deleteFile("foo", "bar");
});
