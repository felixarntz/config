<?php
/**
 * Interface FelixArntz\Config\Config
 *
 * @package FelixArntz\Config
 * @license GNU General Public License, version 2
 * @link    https://github.com/felixarntz/config
 */

namespace FelixArntz\Config;

use FelixArntz\Config\Exception\ConfigKeyNotFoundException;
use FelixArntz\Contracts\Validatable;
use FelixArntz\Contracts\SchemaAware;
use IteratorAggregate;
use ArrayAccess;
use Serializable;
use Countable;

/**
 * Interface for a configuration object.
 *
 * @since 1.0.0
 */
interface Config extends Validatable, SchemaAware, IteratorAggregate, ArrayAccess, Serializable, Countable
{

    /**
     * Check whether the config has a specific key.
     *
     * @since 1.0.0
     *
     * @param string ...$path Key, or path segments if key is nested.
     *
     * @return bool True if the key exists, false otherwise.
     */
    public function has(string ...$path): bool;

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
    public function get(string ...$path);

    /**
     * Get all keys and values.
     *
     * @since 1.0.0
     *
     * @return array Array with the config data.
     */
    public function getAll(): array;
}
