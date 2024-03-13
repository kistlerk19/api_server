<?php

namespace App\Helpers\Routes;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class RouteHelper
{
    public static function includeRouteFiles(string $directory)
    {

        $dirIterator = new RecursiveDirectoryIterator($directory);

        // Check if the directory exists
        if (!is_dir($directory)) {
            throw new \RuntimeException("Directory '$directory' does not exist.");
        }
        // Iterate over the files in the directory
        /** @var RecursiveDirectoryIterator | RecursiveIteratorIterator $iterator */
        $it = new RecursiveIteratorIterator($dirIterator);
        foreach ($it as $file) {
            if ($file->isFile() && $file->isReadable() && $file->getExtension() === 'php') {
                // Require the PHP file
                require $file->getPathname();
            }
        }
    }
}
