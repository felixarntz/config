<?php
/**
 * Class FelixArntz\Config\AbstractConfig
 *
 * @package FelixArntz\Config
 * @license GNU General Public License, version 2
 * @link    https://github.com/felixarntz/config
 */

namespace FelixArntz\Config;

use FelixArntz\Config\Exception\ConfigKeyNotFoundException;
use FelixArntz\Config\Exception\ConfigValidationException;
use FelixArntz\Contracts\SchemaAwareTrait;
use ArrayObject;

/**
 * Abstract class for a configuration object.
 *
 * @since 1.0.0
 */
abstract class AbstractConfig extends ArrayObject implements Config
{
    use SchemaAwareTrait;

    /**
     * Constructor.
     *
     * Sets up the configuration data and schema.
     *
     * @since 1.0.0
     *
     * @param array             $data   Configuration data.
     * @param ConfigSchema|null $schema Optional. Configuration schema. If not provided, the default schema
     *                                  will be used.
     */
    public function __construct(array $data, ConfigSchema $schema = null)
    {
        parent::__construct($data, ArrayObject::ARRAY_AS_PROPS);

        if ($schema === null) {
            $schema = $this->getDefaultSchema();
        }

        $this->setSchema($schema);
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
    public function has(string ...$path): bool
    {
        try {
            $this->get(...$path);
        } catch (ConfigKeyNotFoundException $e) {
            return false;
        }

        return true;
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
    public function get(string ...$path)
    {
        if (count($path) === 1) {
            if (!$this->offsetExists($path[0])) {
                throw ConfigKeyNotFoundException::fromPath($path);
            }

            return $this->offsetGet($path[0]);
        }

        $keys = array_reverse($path);
        $arr  = $this->getArrayCopy();
        while (count($keys) > 0) {
            $key = array_pop($keys);
            if (!isset($arr[$key])) {
                throw ConfigKeyNotFoundException::fromPath($path);
            }

            $arr = $arr[$key];
        }

        return $arr;
    }

    /**
     * Get all keys and values.
     *
     * @since 1.0.0
     *
     * @return array Array with the config data.
     */
    public function getAll(): array
    {
        return $this->getArrayCopy();
    }

    /**
     * Validates the configuration.
     *
     * @since 1.0.0
     *
     * @throws ConfigValidationException Thrown when validation fails.
     */
    public function validate()
    {
        $this->getSchema()->validate($this);
    }

    /**
     * Gets the default schema to use for the configuration.
     *
     * @since 1.0.0
     *
     * @return ConfigSchema Configuration schema.
     */
    abstract protected function getDefaultSchema() : ConfigSchema;
}
