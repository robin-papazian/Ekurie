<?php

namespace App\Factory;

use App\Entity\Ekurie;
use App\Repository\EkurieRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Ekurie>
 *
 * @method        Ekurie|Proxy create(array|callable $attributes = [])
 * @method static Ekurie|Proxy createOne(array $attributes = [])
 * @method static Ekurie|Proxy find(object|array|mixed $criteria)
 * @method static Ekurie|Proxy findOrCreate(array $attributes)
 * @method static Ekurie|Proxy first(string $sortedField = 'id')
 * @method static Ekurie|Proxy last(string $sortedField = 'id')
 * @method static Ekurie|Proxy random(array $attributes = [])
 * @method static Ekurie|Proxy randomOrCreate(array $attributes = [])
 * @method static EkurieRepository|RepositoryProxy repository()
 * @method static Ekurie[]|Proxy[] all()
 * @method static Ekurie[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Ekurie[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Ekurie[]|Proxy[] findBy(array $attributes)
 * @method static Ekurie[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Ekurie[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class EkurieFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->unique()->jobTitle(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Ekurie $ekurie): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Ekurie::class;
    }
}
