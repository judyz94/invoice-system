<?php

namespace Tests\Feature\Products;

use App\Product;
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
        $this->get(route('products.index'))
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
            ->get(route('products.index'))
            ->assertOk();
    }

    /**
     * Validates if the view has products.
     *
     * @test
     * @return void
     */
    public function theIndexHasProducts()
    {
        $products = factory(Product::class, 3)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('products.index'));

        $response->assertSuccessful();
        $response->assertViewHas('products');
    }

    /**
     * Validates that the index can paginate products.
     *
     * @test
     * @return void
     */
    public function theIndexCanPaginateProducts()
    {
        factory(Product::class, 3)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('products.index'));

        $this->assertInstanceOf(
            LengthAwarePaginator::class,
            $response->original->gatherData()['products']
        );
    }
}

