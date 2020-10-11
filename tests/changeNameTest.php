<?php

declare(strict_types = 1);

use function Folded\changeName;

afterEach(function (): void {
    $filePaths = [
        __DIR__ . "/misc/file.csv",
        __DIR__ . "/misc/new.csv",
    ];

    foreach ($filePaths as $filePath) {
        if (file_exists($filePath)) {
            $deleted = unlink($filePath);

            if ($deleted === false) {
                throw new Exception("could not delete file $filePath");
            }
        }
    }
});

it("should rename the file", function (): void {
    $filePath = __DIR__ . "/misc/file.csv";
    $newPath = __DIR__ . "/misc/new.csv";

    $created = file_put_contents($filePath, "");

    if ($created === false) {
        throw new Exception("could not create file $filePath");
    }

    changeName($filePath, $newPath);

    expect(file_exists($filePath))->toBeFalse();
    expect(file_exists($newPath))->toBeTrue();
});

it("should throw an exception if the context is not a resource", function (): void {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage("Expected a resource. Got: string");

    changeName("foo", "bar", "baz");
});
