<?php

use App\Models\User;
use App\Models\Account;
use function Pest\Faker\faker;

it('can_create_an_account', function () {

    $this->withoutExceptionHandling();

    $account = \App\Models\Account::factory([
        'user_id' => null,
    ])->make();
    $response = login()->post(route('accounts.store'), $account->toArray());

    $response->assertRedirect(route('accounts.index'));
    $this->assertDatabaseHas('accounts', $account->toArray());
});

it('can_update_the_billing_address_of_an_account', function () {
    $this->withoutExceptionHandling();

    $account = Account::factory()->create();
    $address = [
        'billing_street'      => $s = faker()->streetAddress,
        'billing_street_2'    => faker()->streetAddress,
        'billing_street_3'    => faker()->streetAddress,
        'billing_city'        => faker()->city,
        'billing_state'       => faker()->state,
        'billing_postal_code' => faker()->postcode,
        'billing_country'     => faker()->country,
    ];

    login()->patch(route('accounts.update', $account), $address)
        ->assertRedirect(route('accounts.index'));

    $this->assertDatabaseHas('accounts', $address);

    $account = Account::latest()->first();

    expect($account)
        ->billing_street->toBeString()->toBe($s)
        ->billing_street_2->toBeString()->not()->toBeEmpty()
        ->billing_street_3->toBeString()->not()->toBeEmpty()
        ->billing_city->toBeString()->not()->toBeEmpty()
        ->billing_state->toBeString()->not()->toBeEmpty()
        ->billing_postal_code->toBeString()->not()->toBeEmpty()
        ->billing_country->toBeString()->not()->toBeEmpty();
});

it('can_update_the_shipping_address_of_an_account', function() {
    $this->withoutExceptionHandling();
    $this->actingAs(User::factory()->create());
    $account = Account::factory()->create();
    $address = [
        'shipping_street'      => faker()->streetAddress,
        'shipping_street_2'    => faker()->streetAddress,
        'shipping_street_3'    => faker()->streetAddress,
        'shipping_city'        => faker()->city,
        'shipping_state'       => faker()->state,
        'shipping_postal_code' => faker()->postcode,
        'shipping_country'     => faker()->country,
    ];
    $response = $this->patch(route('accounts.update', $account), $address);
    $response->assertRedirect(route('accounts.index'));
    $this->assertDatabaseHas('accounts', $address);
});

it('will_set_the_assigned_user_to_null_when_deleted', function() {

    /** @var Account $account */
    $account = \App\Models\Account::factory()->create();
    $account->user()->associate($user = User::factory()->create());
    $account->save();
    $account->refresh();

    $this->assertNotNull($account->user_id);
    $this->assertEquals($user->id, $account->user_id);

    $user->delete();
    $account->refresh();

    $this->assertNull($account->user_id);
});

it('it_can_soft_deletes_an_account', function() {

    $this->withoutExceptionHandling();
    $this->actingAs(User::factory()->create());
    $account = \App\Models\Account::factory()->create();
    $account->delete();
    $this->assertSoftDeleted($account);
});
