<?php
/**
 * Interface FelixArntz\Config\ConfigSchema
 *
 * @package FelixArntz\Config
 * @license GNU General Public License, version 2
 * @link    https://github.com/felixarntz/config
 */

namespace FelixArntz\Config;

use FelixArntz\Config\Exception\ConfigValidationException;
use FelixArntz\Contracts\Schema;

/**
 * Interface for a configuration schema.
 *
 * @since 1.0.0
 */
interface ConfigSchema extends Schema
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
    public function validate(Config $config);
}
