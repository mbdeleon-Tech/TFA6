<?php

namespace Tests\Feature;

use Tests\TestCase;

class PosPagesTest extends TestCase
{
    public function test_all_four_pages_render_with_shared_navigation(): void
    {
        foreach (['/' => 'A good day starts here.', '/about' => 'A simple start. A solid foundation.', '/customers' => 'Customer Accounts', '/users' => 'User Accounts'] as $path => $heading) {
            $response = $this->get($path);
            $response->assertOk()->assertSee($heading);

            foreach (['home', 'about', 'customers.index', 'users.index'] as $name) {
                $response->assertSee('href="'.route($name).'"', false);
            }

            $this->assertSame(1, substr_count($response->getContent(), 'aria-current="page"'));
        }
    }

    public function test_customer_directory_renders_all_static_records_and_correct_totals(): void
    {
        $response = $this->get('/customers');
        $customers = $response->viewData('customers');
        $this->assertGreaterThanOrEqual(5, count($customers));
        $this->assertCount(6, $customers);
        $this->assertSame(4, collect($customers)->where('status', 'Active')->count());
        $this->assertSame(6, substr_count($response->getContent(), '<tr><td>'));
        foreach ($customers as $customer) {
            foreach ($customer as $value) {
                $response->assertSee($value);
            }
        }
        $response->assertSee('Showing 6 of 6 customers');
    }

    public function test_user_directory_renders_all_static_records_and_correct_totals(): void
    {
        $response = $this->get('/users');
        $users = $response->viewData('users');
        $this->assertGreaterThanOrEqual(5, count($users));
        $this->assertCount(6, $users);
        $this->assertSame(5, collect($users)->where('status', 'Active')->count());
        $this->assertSame(4, collect($users)->pluck('role')->unique()->count());
        $this->assertSame(6, substr_count($response->getContent(), '<tr><td>'));
        foreach ($users as $user) {
            foreach ($user as $value) {
                $response->assertSee($value);
            }
        }
        $response->assertSee('Showing 6 of 6 users');
    }

    public function test_customer_values_are_escaped_by_blade(): void
    {
        $html = view('customers.index', ['customers' => [
            ['id' => 'CUS-X', 'name' => '<script>alert(1)</script>', 'email' => 'test@example.com', 'phone' => '000', 'city' => 'Test', 'status' => 'Active'],
        ]])->render();

        $this->assertStringNotContainsString('<script>alert(1)</script>', $html);
        $this->assertStringContainsString('&lt;script&gt;alert(1)&lt;/script&gt;', $html);
    }

    public function test_unknown_page_returns_not_found(): void
    {
        $this->get('/missing-page')->assertNotFound();
    }
}
