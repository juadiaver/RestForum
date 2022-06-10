<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


/**
 * Class ArticuloController
 * @package App\Http\Controllers
 */
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // recuperamos de la request buscarpo que nos dara el paremtro por el que buscar
        $buscar = $request->get('buscarpor');
        // recuperamos del input el valor
        $tipo = $request->get('tipo');

        //metodo para buscar por categorias, solo se buscara por la categoria encontrada en la busqueda.
        if ($tipo == "categoria" && $buscar != ""){
            
            //busquedad de la categoria 
            $categoria = Categoria::where("nombre",'like',"%$buscar%")->first();

            //busqueda de lod articulos
            $articulos = Articulo::where('categoria_id','like',"%$categoria->id%")->paginate(10);

        } else {
           $articulos = Articulo::buscarpor($tipo, $buscar)->paginate(10);  
        }

        return view('articulo.index', compact('articulos','buscar','tipo'))
            ->with('i', (request()->input('page', 1) - 1) * $articulos->perPage());
    }

    /**
     * Llamada a la vista para crear nuevo articulo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulo = new Articulo();
        
        //se crea un array con el nombre y el id de las categorias para pasarlo a la vista
        $categorias = Categoria::all()->pluck('nombre', 'id');
        
        return view('articulo.create', compact('articulo','categorias'));
    }

    /**
     * Crear nuevo articulo.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Articulo::$rules);

        //guardamos en una variable todos los datos de la request
        $input = $request->all();

        //comprobamos si el input imagen no viene vacio
        if ($imagen = $request->file('imagen')) {
            
            //guardamos en nuestro disco S3 la imagen del producto con nombre img.(nombre del articulo).
            Storage::disk('s3')->put("img".$request['nombre'], file_get_contents($input['imagen']));
            //En base de datos el nombre con el que se guarda en AWS (amazon)
            $input['imagen'] = "img".$request['nombre'];
        } else {
            
            //si vienen la request de la imagen vacia se le pone una por defecto.
            Storage::disk('s3')->put("img".$request['nombre'], Storage::disk('s3')->get("sinimagen.png"));
            $input['imagen'] = "img".$request['nombre'];
        }

        $articulo = Articulo::create($input);

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo creado correctamente.');
    }

    /**
     * Ver articulo.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::find($id);

        return view('articulo.show', compact('articulo'));
    }

    /**
     * Llamada a la vista para editar articulo.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //Recuperamos el articulo con el id que nos viene de la request
        $articulo = Articulo::find($id);
        //Metemos las categorias en un array con nombre e id.
        $categorias = Categoria::all()->pluck('nombre', 'id');

        return view('articulo.edit', compact('articulo','categorias'));
    }

    /**
     * Metodo actualizar propucto.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Articulo $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {   
        //Reglas de validacion.
        request()->validate(Articulo::$rules);

        //Recuperamos todos los input
        $input = $request->all();
        
        //igual que el crear comprobamos si el input de la imagen vienen vacio. 
        if ($imagen = $request->file('imagen')) {
            // si hay imagen
            // cambiamos la imagen y borrar del AWS s3 la antigua
            Storage::disk('s3')->delete($articulo->imagen);
            Storage::disk('s3')->put("img".$request['nombre'], file_get_contents($input['imagen']));
            $input['imagen'] = "img".$request['nombre'];
        }else{
            // si no hay imagen quitamos la request iamgen para que no se guarde en BBDD
            unset($input['imagen']);
        }

        $articulo->update($input);

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        //Recuperamos el articulo
        $articulo = Articulo::find($id);
        //Eliminamos la imagen de nuestro docker de AWS
        Storage::disk('s3')->delete($articulo->imagen);
        //Borramos el articulo
        $articulo->delete();

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo borrado correctamente');
    }
}
