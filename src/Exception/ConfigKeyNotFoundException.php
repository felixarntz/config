<?php
/**
 * Class FelixArntz\Config\Exception\ConfigKeyNotFoundException
 *
 * @package FelixArntz\Config
 * @license GNU General Public License, version 2
 * @link    https://github.com/felixarntz/config
 */

namespace FelixArntz\Config\Exception;

use Exception;

/**
 * Exception throw when a configuration key is not found.
 *
 * @since 1.0.0
 */
class ConfigKeyNotFoundException extends Exception
{

    /**
     * Creates a new exception instance for a given key path.
     *
     * @since 1.0.0
     *
     * @param array $path Path segments for the key.
     * @return ConfigKeyNotFoundException Exception instance.
     */
    public static function fromPath(array $path) : ConfigKeyNotFoundException
    {
        return new self(
            sprintf(
                'The configuration key "%s" does not exist.',
                implode(' -> ', $path)
            )
        );
    }
}
