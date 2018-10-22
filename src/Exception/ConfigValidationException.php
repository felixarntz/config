<?php
/**
 * Class FelixArntz\Config\Exception\ConfigValidationException
 *
 * @package FelixArntz\Config
 * @license GNU General Public License, version 2
 * @link    https://github.com/felixarntz/config
 */

namespace FelixArntz\Config\Exception;

use FelixArntz\Contracts\Exception\ValidationException;

/**
 * Exception throw when validation of a configuration fails.
 *
 * @since 1.0.0
 */
class ConfigValidationException extends ValidationException
{

    /**
     * Creates a new exception instance for a missing key.
     *
     * @since 1.0.0
     *
     * @param string $key Missing configuration key.
     * @return ConfigValidationException Exception instance.
     */
    public static function fromMissingKey(string $key)
    {
        return new self(
            sprintf(
                'Missing configuration key "%s".',
                $key
            )
        );
    }

    /**
     * Creates a new exception instance for an invalid key.
     *
     * @since 1.0.0
     *
     * @param string $key     Invalid configuration key.
     * @param string $message Error message.
     * @return ConfigValidationException Exception instance.
     */
    public static function fromInvalidKey(string $key, string $message)
    {
        return new self(
            sprintf(
                'Invalid configuration key "%s": %s',
                $key,
                $message
            )
        );
    }
}
