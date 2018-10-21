<?php
/**
 * Trait FelixArntz\Config\ConfigAwareTrait
 *
 * @package FelixArntz\Config
 * @license GNU General Public License, version 2
 * @link    https://github.com/felixarntz/config
 */

namespace FelixArntz\Config;

use FelixArntz\Config\Exception\ConfigValidationException;
use FelixArntz\Config\Exception\ConfigKeyNotFoundException;

/**
 * Trait for a class that uses a configuration object.
 *
 * @since 1.0.0
 */
trait ConfigAwareTrait
{

    /**
     * Configuration object.
     *
     * @since 1.0.0
     * @var Config
     */
    protected $config;

    /**
     * Validates and sets the configuration object.
     *
     * @since 1.0.0
     *
     * @param Config            $config Configuration object.
     * @param ConfigSchema|null $schema Optional. Extra configuration schema to validate the configuration object
     *                                  against. Default null.
     *
     * @throws ConfigValidationException Thrown when validation fails.
     */
    protected function setConfig(Config $config, ConfigSchema $schema = null)
    {
        if ($schema) {
            $schema->validate($config);
        }

        $config->validate();

        $this->config = $config;
    }

    /**
     * Check whether the config has a specific key.
     *
     * @since 1.0.0
     *
     * @param string ...$path Key, or path segments if key is nested.
     *
     * @return bool True if the key exists, false otherwise.
     */
    protected function hasConfigKey(string ...$path): bool
    {
        return $this->config->has(...$path);
    }

    /**
     * Get the value for a specific key.
     *
     * @since 1.0.0
     *
     * @param string ...$path Key, or path segments if key is nested.
     *
     * @return mixed Value for the key.
     *
     * @throws ConfigKeyNotFoundException Thrown if the key does not exist.
     */
    protected function getConfigKey(string ...$path)
    {
        return $this->config->get(...$path);
    }
}
