<?php

use Illuminate\Support\Facades\DB;
use Workbench\App\Models\User;

it('merges a single string column', function () {
    $query = User::query()->select('id')->mergeSelect('email');

    expect($query->toSql())->toBe('select "id", "email" from "users"');
});

it('merges an array of columns', function () {
    $query = User::query()->select(['id', 'name'])->mergeSelect(['email', 'created_at']);

    expect($query->toSql())->toBe('select "id", "name", "email", "created_at" from "users"');
});

it('merges when no initial select (adds *)', function () {
    $query = User::query()->mergeSelect('email');

    expect($query->toSql())->toBe('select *, "email" from "users"');
});

it('accepts an Expression (DB::raw)', function () {
    $query = User::query()
        ->mergeSelect(DB::raw('count(*) as total'))
        ->groupBy('id');

    expect($query->toSql())->toBe('select *, count(*) as total from "users" group by "id"');
});

it('throws exception on invalid input type', function () {
    $query = User::query()->select('id');
    $query->mergeSelect(123); // invalid type
})->throws(InvalidArgumentException::class);
