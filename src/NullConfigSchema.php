<?php
/**
 * Class FelixArntz\Config\NullConfigSchema
 *
 * @package FelixArntz\Config
 * @license GNU General Public License, version 2
 * @link    https://github.com/felixarntz/config
 */

namespace FelixArntz\Config;

use FelixArntz\Config\Exception\ConfigValidationException;

/**
 * Class for a configuration schema that does nothing.
 *
 * @since 1.0.0
 */
class NullConfigSchema implements ConfigSchema
{

    /**
     * Validates a configuration object against the schema.
     *
     * @since 1.0.0
     *
     * @param Config $config Configuration object to validate.
     *
     * @throws ConfigValidationException Thrown when validation fails.
     */
    public function validate(Config $config)
    {
        // Empty method body.
    }
}
