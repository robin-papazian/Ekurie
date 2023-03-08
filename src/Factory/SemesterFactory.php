<?php

namespace App\Factory;

use App\Entity\Semester;
use App\Repository\SemesterRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Semester>
 *
 * @method        Semester|Proxy create(array|callable $attributes = [])
 * @method static Semester|Proxy createOne(array $attributes = [])
 * @method static Semester|Proxy find(object|array|mixed $criteria)
 * @method static Semester|Proxy findOrCreate(array $attributes)
 * @method static Semester|Proxy first(string $sortedField = 'id')
 * @method static Semester|Proxy last(string $sortedField = 'id')
 * @method static Semester|Proxy random(array $attributes = [])
 * @method static Semester|Proxy randomOrCreate(array $attributes = [])
 * @method static SemesterRepository|RepositoryProxy repository()
 * @method static Semester[]|Proxy[] all()
 * @method static Semester[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Semester[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Semester[]|Proxy[] findBy(array $attributes)
 * @method static Semester[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Semester[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class SemesterFactory extends ModelFactory
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
            'enumerate' => self::faker()->numerify('# éme semestre'),
            'starting_date' => self::faker()->dateTimeThisYear(),
            'ending_date' => self::faker()->dateTimeThisYear('+2 months'),
            'name' => self::faker()->numerify('UE #.#.#.')
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Semester $semester): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Semester::class;
    }
}
