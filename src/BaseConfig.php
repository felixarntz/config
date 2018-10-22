<?php
/**
 * Class FelixArntz\Config\BaseConfig
 *
 * @package FelixArntz\Config
 * @license GNU General Public License, version 2
 * @link    https://github.com/felixarntz/config
 */

namespace FelixArntz\Config;

/**
 * Class for a configuration object.
 *
 * @since 1.0.0
 */
class BaseConfig extends AbstractConfig
{

    /**
     * Gets the default schema to use for the configuration.
     *
     * @since 1.0.0
     *
     * @return ConfigSchema Configuration schema.
     */
    protected function getDefaultSchema() : ConfigSchema
    {
        return new NullConfigSchema();
    }
}
