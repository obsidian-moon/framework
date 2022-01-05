<?php
/**
 * Handle the Laravel Mix manifest so that we can use cache breaking.
 *
 * Inspired by Laravel's (https://laravel.com) `mix()` helper function.
 *
 * Examples:
 *
 * ```
 *   mix('css/app.css')
 *   mix('js/app.js')
 * ```
 */
if (!function_exists('mix')) {
    function mix($path, $manifest = false): ?string
    {
        if ( ! $manifest ) {
            $manifestPath = PUBLIC_ROOT . '/mix-manifest.json';

            if (!is_file($manifestPath)) {
                throw new RuntimeException(
                    'The Laravel Mix manifest file does not exist. '
                    . 'Please run "npm run webpack" and try again.'
                );
            }

            try {
                $manifest =
                    json_decode(
                        json: file_get_contents($manifestPath),
                        associative: true,
                        depth: 512,
                        flags: JSON_THROW_ON_ERROR
                    );
            } catch (JsonException $e) {
                throw new RuntimeException('Was unable to process the manifest file, please try again!');
            }
        }

        if (!str_starts_with($path, '/')) {
            $path = "/{$path}";
        }

        if (!array_key_exists($path, $manifest)) {
            throw new RuntimeException(
                "Unknown Laravel Mix file path: {$path}. Please check your requested " .
                'webpack.mix.js output path, and try again.'
            );
        }

        return $manifest[$path];
    }
}
