# folded/history

Manipulate files with functions for your web app.

[![Build Status](https://travis-ci.com/folded-php/file.svg?branch=master)](https://travis-ci.com/folded-php/file) [![Maintainability](https://api.codeclimate.com/v1/badges/b5a5af3f90a5a429fec3/maintainability)](https://codeclimate.com/github/folded-php/file/maintainability) [![TODOs](https://img.shields.io/endpoint?url=https://api.tickgit.com/badge?repo=github.com/folded-php/file)](https://www.tickgit.com/browse?repo=github.com/folded-php/file)

## Summary

- [About](#about)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Examples](#examples)
- [Version support](#version-support)

## About

I created this library, to avoid having to throw exception in my code when I use the file functions.

Folded is a constellation of packages to help you setting up a web app easily, using ready to plug in packages.

- [folded/action](https://github.com/folded-php/action): A way to organize your controllers for your web app.
- [folded/config](https://github.com/folded-php/config): Configuration utilities for your PHP web app.
- [folded/crypt](https://github.com/folded-php/crypt): Encrypt and decrypt strings for your web app.
- [folded/exception](https://github.com/folded-php/exception): Various kind of exception to throw for your web app.
- [folded/history](https://github.com/folded-php/history): Manipulate the browser history for your web app.
- [folded/http](https://github.com/folded-php/http): HTTP utilities for your web app.
- [folded/orm](https://github.com/folded-php/orm): An ORM for you web app.
- [folded/routing](https://github.com/folded-php/routing): Routing functions for your PHP web app.
- [folded/request](https://github.com/folded-php/request): Request utilities, including a request validator, for your PHP web app.
- [folded/session](https://github.com/folded-php/session): Session functions for your web app.
- [folded/view](https://github.com/folded-php/view): View utilities for your PHP web app.

## Features

- Will throw an Exception if an error occured while using the functions
- Have the exact same signature as the native functions

## Requirements

- PHP version >= 7.4.0
- Composer installed

## Installation

In your root folder, run this command:

```bash
composer required folded/file
```

## Examples

- [1. Open a file](#1-open-a-file)
- [2. Close a file](#2-close-a-file)
- [3. Delete a file](#3-delete-a-file)
- [4. Write a CSV row to a file](#4-write-a-csv-row-to-a-file)
- [5. Read a CSV row from a file](#5-read-a-csv-row-from-a-file)
- [6. Rename a file](#6-rename-a-file)
- [7. Write on file](#7-write-on-file)

### 1. Open a file

In this example, we will get an opened file.

```php
use function Folded\openFile;

$file = openFile("path/to/file.txt", "r");
```

### 2. Close a file

In this example, we will close an opened file.

```php
use function Folded\openFile;
use function Folded\closeFile;

$file = openFile("path/to/file.txt", "r");

closeFile($file);
```

### 3. Delete a file

In this example, we will delete an existing file.

```php
use function Folded\deleteFile;

deleteFile("path/to/file.txt");
```

### 4. Write a CSV row to a file

In this example, we will write a CSV row in a file.

```php
use function Folded\openFile;
use function Folded\addCsvRowToFile;

$file = openFile("path/to/file.csv", "w");

addCsvRowToFile($file, ["foo", "bar"]);
```

### 5. Read a CSV row from a file

In this example, we will get a CSV row from a file. Subsequent calls will get the next rows from the file.

```php
use function Folded\openFile;
use function Folded\getCsvRowFromFile;

$file = openFile("path/to/file.csv", "r");

$firstRow = getCsvRowFromFile($file);
$secondRow = getCsvRowFromFile($file);
```

### 6. Rename a file

In this example, we will rename a file.

```php
use function Folded\changeName;

changeName("path/to/old.txt", "path/to/new.txt");
```

### 7. Write on file

In this example, we will write on an opened file.

```php
use function Folded\writeOnFile;

$file = fopen("path/to/file.txt");

writeToFile($file, "some text");
```

If you need to get the number of bytes written, get the return of the function.

```php
use function Folded\writeOnFile;

$file = fopen("path/to/file.txt");

$numberOfBytesWritten = writeToFile($file, "some text");

echo "$numberOfBytesWritten bytes written";
```

## Version support

|        | 7.3 | 7.4 | 8.0 |
| ------ | --- | --- | --- |
| v0.1.0 | ❌  | ✔️  | ❓  |
