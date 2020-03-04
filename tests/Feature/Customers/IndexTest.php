<?php

namespace Tests\Feature\Customers;

use App\Customer;
use App\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Validates unauthenticated users cannot access
     * to the index view.
     *
     * @test
     * @return void
     */
    public function unAuthorizedUsersCannotAccessTheIndex()
    {
        $this->get(route('customers.index'))
            ->assertRedirect(route('login'));
    }

    /**
     * Validates authorized users to access the index view.
     *
     * @return void
     */
    public function authorizedUsersIndex()
    {
        $user = factory(User::class)->create();

        $this
            ->actingAs($user)
            ->get(route('customers.index'))
            ->assertOk();
    }

    /**
     * Validates if the view has customers.
     *
     * @test
     * @return void
     */
    public function theIndexHasCustomers()
    {
        $customers = factory(Customer::class, 3)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('customers.index'));

        $response->assertSuccessful();
        $response->assertViewHas('customers');
    }

    /**
     * Validates if there is a message when no customers where found.
     *
     * @test
     * @return void
     */
    public function MessageWhenNoCustomersWhereFound()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('customers.index'));

        $response->assertSee(__('No customers were found'));
    }

    /**
     * Validates that the index can paginate customers.
     *
     * @test
     * @return void
     */
    public function theIndexCanPaginateCustomers()
    {
        factory(Customer::class, 3)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('customers.index'));

        $this->assertInstanceOf(
            LengthAwarePaginator::class,
            $response->original->gatherData()['customers']
        );
    }
}

