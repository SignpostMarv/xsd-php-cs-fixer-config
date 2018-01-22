<?php
/**
* @author SignpostMarv
*/

namespace GoetasWebservices\CS;

use PhpCsFixer\Config as BaseConfig;
use PhpCsFixer\Finder as DefaultFinder;

class Config extends BaseConfig
{
    const DEFAULT_RULES = [
        '@Symfony' => true,
        'yoda_style' => false,
        'phpdoc_to_comment' => false, // required for type hinting
        'phpdoc_var_without_name' => false, // required for type hinting
    ];

    public function __construct(array $inPaths)
    {
        parent::__construct(
            str_replace(
                '\\',
                ' - ',
                preg_replace(
                    '/([a-z0-9])([A-Z])/',
                    '$1 $2',
                    get_called_class()
                )
            )
        );

        $this->setUsingCache(true);
        $this->setRules(static::RuntimeResolveRules());

        /**
         * @var DefaultFinder $finder
         */
        $finder = $this->getFinder();
        $this->setFinder(array_reduce(
            $inPaths,
            /**
             * @param string $directory
             *
             * @return DefaultFinder
             */
            function (DefaultFinder $finder, $directory) {
                if (is_file($directory) === true) {
                    return $finder->append([$directory]);
                }

                return $finder->in($directory);
            },
            $finder->ignoreUnreadableDirs()
        ));
    }

    /**
     * Resolve rules at runtime.
     *
     * @return array
     */
    protected static function RuntimeResolveRules()
    {
        return (array) static::DEFAULT_RULES;
    }
}
