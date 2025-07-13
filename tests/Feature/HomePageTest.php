<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
  use RefreshDatabase;

  /**
   * Test that the home page loads successfully.
   */
  public function test_home_page_loads_successfully(): void
  {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertViewIs('home');
  }

  /**
   * Test that the home page displays categories.
   */
  public function test_home_page_displays_categories(): void
  {
    Category::factory()->create(['name' => 'Electronics']);
    Category::factory()->create(['name' => 'Furniture']);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('Electronics');
    $response->assertSee('Furniture');
  }

  /**
   * Test that the home page displays recent ads.
   */
  public function test_home_page_displays_recent_ads(): void
  {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    Ad::factory()->create([
      'title' => 'iPhone for Sale',
      'user_id' => $user->id,
      'category_id' => $category->id
    ]);

    Ad::factory()->create([
      'title' => 'Sofa Set',
      'user_id' => $user->id,
      'category_id' => $category->id
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('iPhone for Sale');
    $response->assertSee('Sofa Set');
  }
}
