<?php

namespace Fliva\EloquentMergeSelect\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fliva\EloquentMergeSelect\EloquentMergeSelect
 */
class EloquentMergeSelect extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Fliva\EloquentMergeSelect\EloquentMergeSelect::class;
    }
}
