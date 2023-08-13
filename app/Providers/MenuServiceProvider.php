<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use PDO;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    $verticalMenuData = json_decode($this->getMenuItems());
    $horizontalMenuData = json_decode($this->getMenuItems());

    // Share all menuData to all the views
    \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
  }

  public function getMenuItems()
  {
    $data = Category::all();

    $items = [];

    array_push($items, [
      "url" => "/",
      "name" => "Home",
      "icon" => "menu-icon tf-icons bx bx-home-circle",
      "slug" => "pages-home"
    ]);

    foreach($data as $key){
      $ejemplo =  [
        "url" => "?search=".$key['name'],
        "name" => $key['name'],
        "icon" => "menu-icon tf-icons bx bx-home-circle",
        "slug" => $key['name']
      ];
      array_push($items, $ejemplo);
    }

    return json_encode($items);
  }

}
