<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;
use Image;

trait ImageTrait {
  /*

  */
  public function webImage(Request $request, $input_name, $model, $id){

    $path = storage_path('app/public') . "/$model/$id/";

    if ($request->hasFile($input_name)) {
      try {
        /* Traemos el input de tipo archivo */
        $file = $request->file($input_name);
        /* Encriptacion del nombre de la imagen */
        $name_encript = strtolower(Str::random(15));
        /* Crear la imagen de nuestro input de tipo archivo */
        $image = Image::make($file);
        /* Cambiamos extension y establecemos la calidad de imagen */
        $image->encode('webp', 100);

        /* Crear la carpeta que va a contener las imagenes y guardar el archivo */
        Storage::disk('public')->makeDirectory($model . '/' . $id);
        $image->save($path . $name_encript . '.webp');

        return response()->json([
          'status' => true,
          'name' => "$model/$id/$name_encript.webp",
          'message' => 'Se ha guardado con exito.',
        ]);


      } catch (Exception $ex) {
        return response()->json([
          'status' => false,
          'name' => "null",
          'message' => $ex->getMessage(),
        ]);
      }
    } else {
      return response()->json([
        'status' => false,
        'name' => "null",
        'message' => 'El input que esta enviando, no es un archivo',
      ]);
    }

  }
  //script para subir o mover la imagen
  public static function moveImage(Request $request, $filename, $endFilename){

    if (!empty($request->hasFile($filename))) {
        $image = $request->file($filename);
        $basePath = "img/videos/";
        $file = $endFilename ?? $filename;
        $path = "$basePath$file." . $image->guessExtension();
        if (file_exists($path)) unlink($path);
        $route = public_path($basePath);
        $image->move($route, $file . '.' . $image->guessExtension());
        return $path;
    } else {
        return 'NULL';
    }
  }
}
