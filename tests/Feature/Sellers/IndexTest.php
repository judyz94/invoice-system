<?php

namespace Tests\Feature\Sellers;

use App\Seller;
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
        $this->get(route('sellers.index'))
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
            ->get(route('sellers.index'))
            ->assertOk();
    }

    /**
     * Validates if the view has sellers.
     *
     * @test
     * @return void
     */
    public function theIndexHasSellers()
    {
        $sellers = factory(Seller::class, 3)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('sellers.index'));

        $response->assertSuccessful();
        $response->assertViewHas('sellers');
    }

    /**
     * Validates if there is a message when no sellers where found.
     *
     * @test
     * @return void
     */
    public function MessageWhenNoSellersWhereFound()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('sellers.index'));

        $response->assertSee(__('No sellers were found'));
    }

    /**
     * Validates that the index can paginate sellers.
     *
     * @test
     * @return void
     */
    public function theIndexCanPaginateSellers()
    {
        factory(Seller::class, 3)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('sellers.index'));

        $this->assertInstanceOf(
            LengthAwarePaginator::class,
            $response->original->gatherData()['sellers']
        );
    }
}

