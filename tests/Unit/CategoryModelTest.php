<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryModelTest extends TestCase
{
  use RefreshDatabase;

  /**
   * Test that a category can have multiple ads.
   */
  public function test_category_can_have_multiple_ads(): void
  {
    $category = Category::factory()->create(['name' => 'Electronics']);
    $user = User::factory()->create();

    $ad1 = Ad::factory()->create([
      'title' => 'iPhone',
      'category_id' => $category->id,
      'user_id' => $user->id
    ]);

    $ad2 = Ad::factory()->create([
      'title' => 'Laptop',
      'category_id' => $category->id,
      'user_id' => $user->id
    ]);

    $this->assertCount(2, $category->ads);
    $this->assertTrue($category->ads->contains($ad1));
    $this->assertTrue($category->ads->contains($ad2));
  }

  /**
   * Test that a category can have a parent category.
   */
  public function test_category_can_have_parent(): void
  {
    $parentCategory = Category::factory()->create(['name' => 'Electronics']);
    $childCategory = Category::factory()->create([
      'name' => 'Smartphones',
      'parent_id' => $parentCategory->id
    ]);

    $this->assertEquals($parentCategory->id, $childCategory->parent->id);
    $this->assertEquals('Electronics', $childCategory->parent->name);
  }

  /**
   * Test that a category can have multiple children.
   */
  public function test_category_can_have_children(): void
  {
    $parentCategory = Category::factory()->create(['name' => 'Electronics']);

    $child1 = Category::factory()->create([
      'name' => 'Smartphones',
      'parent_id' => $parentCategory->id
    ]);

    $child2 = Category::factory()->create([
      'name' => 'Laptops',
      'parent_id' => $parentCategory->id
    ]);

    $this->assertCount(2, $parentCategory->children);
    $this->assertTrue($parentCategory->children->contains($child1));
    $this->assertTrue($parentCategory->children->contains($child2));
  }

  /**
   * Test that category fillable attributes are set correctly.
   */
  public function test_category_fillable_attributes(): void
  {
    $category = new Category();

    $expectedFillable = ['name', 'parent_id'];
    $this->assertEquals($expectedFillable, $category->getFillable());
  }

  /**
   * Test that a category without parent has null parent relationship.
   */
  public function test_category_without_parent_has_null_parent(): void
  {
    $category = Category::factory()->create(['name' => 'Electronics']);

    $this->assertNull($category->parent);
  }

  /**
   * Test that a category without children returns empty collection.
   */
  public function test_category_without_children_returns_empty_collection(): void
  {
    $category = Category::factory()->create(['name' => 'Electronics']);

    $this->assertCount(0, $category->children);
  }
}
