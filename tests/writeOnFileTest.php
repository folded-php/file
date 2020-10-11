<?php

declare(strict_types = 1);

use function Folded\writeOnFile;

afterEach(function (): void {
    $filePath = __DIR__ . "/misc/file.csv";

    if (file_exists($filePath)) {
        $deleted = unlink($filePath);

        if ($deleted === false) {
            throw new Exception("could not deleted file $filePath");
        }
    }
});

it("should write on file", function (): void {
    $filePath = __DIR__ . "/misc/file.csv";
    $file = fopen($filePath, "w");
    $text = "foo";

    if ($file === false) {
        throw new Exception("could not open file $filePath");
    }

    writeOnFile($file, $text);

    $closed = fclose($file);

    if ($closed === false) {
        throw new Exception("could not close file $filePath");
    }

    expect(file_get_contents($filePath))->toBe($text);
});

it("should return the written bytes", function (): void {
    $filePath = __DIR__ . "/misc/file.csv";
    $file = fopen($filePath, "w");

    if ($file === false) {
        throw new Exception("could not open file $filePath");
    }

    $numberOfBytesWritten = writeOnFile($file, "foo");

    $closed = fclose($file);

    if ($closed === false) {
        throw new Exception("could not close file $filePath");
    }

    expect($numberOfBytesWritten)->toBe(3);
});

it("should throw an exception if the file handler is not a resource", function (): void {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage("Expected a resource. Got: string");

    writeOnFile(__DIR__ . "/misc/file.csv", "foo");
});
