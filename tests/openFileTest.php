<?php

declare(strict_types = 1);

use function Folded\openFile;

afterEach(function (): void {
    $filePath = __DIR__ . "/misc/file.csv";

    if (file_exists($filePath)) {
        $deleted = unlink($filePath);

        if ($deleted === false) {
            throw new Exception("could not delete file $filePath");
        }
    }
});

it("should open the file", function (): void {
    expect(is_resource(openFile(__DIR__ . "/misc/file.csv", "a")))->toBeTrue();
});

it("should throw an exception if the context is not a resource", function (): void {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage("Expected a resource. Got: string");

    openFile("foo", "r", false, "bar");
});
