<?php

declare(strict_types = 1);

use function Folded\closeFile;

it("should close the file", function (): void {
    $file = fopen(__DIR__ . "/misc/file.csv", "a");

    closeFile($file);

    // When a file is closed, the handle is not a resource anymore
    expect(is_resource($file))->toBeFalse();
});
