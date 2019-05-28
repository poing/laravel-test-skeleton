<?php

namespace Poing\Skeleton\Test;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Poing\Skeleton\SkeletonFacade;
use Poing\Skeleton\SkeletonServiceProvider;


class TestCase extends OrchestraTestCase
{

    use DatabaseMigrations;

    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return Poing\Skeleton\SkeletonServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [SkeletonServiceProvider::class];
    }

    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Skeleton' => SkeletonFacade::class,
        ];
    }

    /**
     * Load environment setup.
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        // Make sure php-sqlite3 is installed on the system.
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

}