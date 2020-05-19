<?php

namespace Tests\Feature\Admin\Invoices;

use App\User;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexInvoiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Validates authorized users to access the index view.
     *
     * @return void
     */
    public function test_authorized_user_can_see_invoices_index()
    {
        $permission = Permission::create([
            'name' => 'Invoices index',
            'slug' => 'invoices.index']);

        $user = factory(User::class)->create()->can($permission);

        $response = $this->actingAs($user)->get(route('invoices.index'));
        $response->assertOk();
    }
}
