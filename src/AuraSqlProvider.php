<?php
/**
 * This file is part of the Ray.AuraSqlModule package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\AuraSqlModule;

use Aura\Sql\ExtendedPdo;
use Ray\Di\Di\Named;
use Ray\Di\ProviderInterface;

class AuraSqlProvider implements ProviderInterface
{
    /**
     * @var string
     */
    private $dsn;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @param array $config
     *
     * @Named("aura_sql_config")
     */
    public function __construct(array $config)
    {
        list($this->dsn, $this->user, $this->password) = $config;
    }
    /**
     * {@inheritdoc}
     */
    public function get()
    {
        $pdo = new ExtendedPdo(
            $this->dsn,
            $this->user,
            $this->password
        );

        return $pdo;
    }
}
