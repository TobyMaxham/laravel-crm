<?php

use PHPUnit\Framework\ExpectationFailedException;
use \Illuminate\Support\Str;

uses(Tests\TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBePhoneNumber', function () {
    expect($this->value)->toBeString()->toStartWith('+');

    if(strlen($this->value) < 6) {
        throw new ExpectationFailedException('Phone numbers must be at least 6 characters.');
    }

    if(Str::of($this->value)->after('+')->remove([' ', '-', '/'])) {
        throw new ExpectationFailedException('Phone numbers must be numeric.');
    }
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function login($user = null)
{
    return test()->actingAs($user ?? \App\Models\User::factory()->create());
}
