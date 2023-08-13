<?php
  function main() {
    $request = $_REQUEST['items'];
    if(isset($request)){
      $host = config('personal.HOST');
      $user = config('personal.DB_USER');
      $password = config('personal.DB_PASSWORD');
      $dbName = config('personal.DB_NAME');
      $table = 'category';
      $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
      $stmt = $pdo->prepare("SELECT * FROM $table");
      $stmt->execute();
      $data = $stmt->fetchAll();
      $pdo = null;

      $items = [['header' => 'Categorias']];

      array_push($items, [
        "url" => "/",
        "name" => "Home",
        "icon" => "menu-icon tf-icons bx bx-home-circle",
        "slug" => "pages-home"
      ]);

      foreach($data as $key){
        $ejemplo =  [
          "url" => $key['id'],
          "name" => $key['name'],
          "icon" => "menu-icon tf-icons bx bx-home-circle",
          "slug" => $key['name']
        ];
        array_push($items, $ejemplo);
      }
      //echo $data;
      echo json_encode($items);
    }
  }

  return main();
