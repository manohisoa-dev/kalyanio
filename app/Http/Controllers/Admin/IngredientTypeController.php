<?php
namespace App\Http\Controllers\admin;

use App\IngredientType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class IngredientTypeController extends Controller
{
    public $viewDir = "admin.ingredient_type";

    public function index()
    {
        $records = IngredientType::findRequested();
        return $this->view( "index", ['records' => $records] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $this->validate($request, IngredientType::validationRules());

        IngredientType::create($request->all());

        # notification
        Notify::success('Ingredient Type a été créer avec succès');
        return redirect(route('admin.ingredient-type.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, IngredientType $ingredientType)
    {
        return $this->view("show",['ingredientType' => $ingredientType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, IngredientType $ingredientType)
    {
        return $this->view( "edit", ['ingredientType' => $ingredientType] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, IngredientType $ingredientType)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, IngredientType::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $ingredientType->update($data);
            return "Record updated";
        }

        $this->validate($request, IngredientType::validationRules());

        $ingredientType->update($request->all());

        # notification
        Notify::success('Ingredient Type a été mise à jour avec succès');
        return redirect(route('admin.ingredient-type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, IngredientType $ingredientType)
    {
        $ingredientType->delete();

        # notification
        Notify::success('Ingredient Type a été supprimer avec succès');
        return redirect(route('admin.ingredient-type.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
