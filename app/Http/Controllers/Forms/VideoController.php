<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Traits\ImageTrait;

/**
 * Class VideoController
 * @package App\Http\Controllers
 */
class VideoController extends Controller
{

  use ImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::paginate();

        return view('video.index', compact('videos'))
            ->with('i', (request()->input('page', 1) - 1) * $videos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $video = new Video();

        $categorias = Category::pluck('name as label', 'id as value');

        return view('video.create', compact('video', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Video::$rules);

        $video = new Video();

        $video->titulo = $request['titulo'];
        $video->link = $request['link'];
        $video->description = $request['description'];
        $video->id_categoria = $request['id_categoria'];
        $data = $request->except(['_token', '_method']);

        $save = $video->save();

        if ($save && isset($data['miniatura'])) {
          /* Indicar ruta o modelo para guardar las miniaturas */
          $modelo = "videos";
          /* Guardar la miniatura */
          $nameFile = $this->webImage($request, 'miniatura', $modelo, $video->id);
          $data = $nameFile->getData();
          if ($data->status) {
            $video->update([
              'miniatura' => $data->name,
            ]);
          }
        }

        return redirect()->route('videos.index')
            ->with('success', 'Video creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);

        return view('video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);

        $categorias = Category::pluck('name as label', 'id as value');

        return view('video.edit', compact('video', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        request()->validate(Video::$rules);

        $video->titulo = $request['titulo'];
        $video->link = $request['link'];
        $video->description = $request['description'];
        $video->id_categoria = $request['id_categoria'];

        $save = $video->save();

        $data = $request->except(['_token', '_method']);

        if ($save && isset($data['miniatura'])) {
          /* Indicar ruta o modelo para guardar las miniaturas */
          $modelo = "videos";
          /* Guardar la miniatura */
          $nameFile = $this->webImage($request, 'miniatura', $modelo, $video->id);
          $data = $nameFile->getData();
          if ($data->status) {
            $video->update([
              'miniatura' => $data->name,
            ]);
          }
        }

        return redirect()->route('videos.index')
            ->with('success', 'Video actualizado con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $video = Video::find($id)->delete();

        return redirect()->route('videos.index')
            ->with('success', 'Video eliminado con éxito.');
    }
}
