<?php

namespace Fliva\EloquentMergeSelect\Tests;

use Fliva\EloquentMergeSelect\EloquentMergeSelectServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use WithWorkbench;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn ($name) => 'Fliva\\EloquentMergeSelect\\Database\\Factories\\'.class_basename($name).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            EloquentMergeSelectServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testing');
    }
}
