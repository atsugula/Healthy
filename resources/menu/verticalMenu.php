<?php

/* CARGAR CATEGORIAS */

use App\Models\Category;

function categoryMenu() {
  $categories = Category::all();

  $menus = [];

  array_push($menus, [
    "url" => "/",
    "name" => "Home",
    "icon" => "menu-icon tf-icons bx bx-home-circle",
    "slug" => "pages-home"
  ]);

  foreach ($categories as $category) {
    array_push($menus, [
      "url" => "$category->id",
      "name" => "$category->name",
      "icon" => "menu-icon tf-icons bx bx-home-circle",
      "slug" => "$category->name"
    ]);
  }

  return response()->json(['menu' => $menus]);

}

return categoryMenu();
