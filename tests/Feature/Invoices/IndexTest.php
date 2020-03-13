<?php

namespace Tests\Feature\Invoices;

use App\Invoice;
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
        $this->get(route('invoices.index'))
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
            ->get(route('invoices.index'))
            ->assertOk();
    }

    /**
     * Validates if the view has invoices.
     *
     * @test
     * @return void
     */
    public function theIndexHasInvoices()
    {
        $invoices = factory(Invoice::class, 3)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('invoices.index'));

        $response->assertSuccessful();
        $response->assertViewHas('invoices');
    }

    /**
     * Validates if there is a message when no invoices where found.
     *
     * @test
     * @return void
     */
    public function MessageWhenNoInvoicesWhereFound()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('invoices.index'));

        $response->assertSee(__('No invoices were found'));
    }

    /**
     * Validates that the index can paginate invoices.
     *
     * @test
     * @return void
     */
    public function theIndexCanPaginateInvoices()
    {
        factory(Invoice::class, 3)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('invoices.index'));

        $this->assertInstanceOf(
            LengthAwarePaginator::class,
            $response->original->gatherData()['invoices']
        );
    }
}

