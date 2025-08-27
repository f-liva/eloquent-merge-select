<?php

namespace Fliva\EloquentMergeSelect;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as BaseBuilder;
use Illuminate\Database\Query\Expression;
use InvalidArgumentException;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EloquentMergeSelectServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('eloquent-merge-select');
    }

    public function boot(): void
    {
        /**
         * Macro for Eloquent\Builder
         * Allows using mergeSelect() directly on Eloquent queries.
         */
        Builder::macro('mergeSelect', function ($columns) {
            /** @var \Illuminate\Database\Eloquent\Builder $this */
            $this->getQuery()->mergeSelect($columns);

            return $this;
        });

        /**
         * Macro for Query\Builder
         * Merges existing select columns with the provided ones.
         */
        BaseBuilder::macro('mergeSelect', function ($columns) {
            /** @var \Illuminate\Database\Query\Builder $this */

            // Normalize input into array
            if (is_string($columns) || $columns instanceof Expression) {
                $columns = [$columns];
            }

            if (! is_array($columns)) {
                throw new InvalidArgumentException('mergeSelect only accepts string, array, or Expression.');
            }

            // If no columns are defined → default to "*" plus the new ones
            if (empty($this->columns)) {
                $this->columns = array_merge(['*'], $columns);

                return $this;
            }

            // Merge with already defined columns
            $this->columns = array_merge($this->columns, $columns);

            return $this;
        });
    }
}
