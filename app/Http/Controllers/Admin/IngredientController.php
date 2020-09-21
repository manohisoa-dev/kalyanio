<?php
namespace App\Http\Controllers\admin;

use App\Ingredient;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class IngredientController extends Controller
{
    public $viewDir = "admin.ingredient";

    public function index()
    {
        $records = Ingredient::findRequested();
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
        $this->validate($request, Ingredient::validationRules());

        Ingredient::create($request->all());

        # notification
        Notify::success('Ingredient a été créer avec succès');
        return redirect(route('admin.ingredient.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Ingredient $ingredient)
    {
        return $this->view("show",['ingredient' => $ingredient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Ingredient $ingredient)
    {
        return $this->view( "edit", ['ingredient' => $ingredient] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Ingredient::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $ingredient->update($data);
            return "Record updated";
        }

        $this->validate($request, Ingredient::validationRules());

        $ingredient->update($request->all());

        # notification
        Notify::success('Ingredient a été mise à jour avec succès');
        return redirect(route('admin.ingredient.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Ingredient $ingredient)
    {
        $ingredient->delete();

        # notification
        Notify::success('Ingredient a été supprimer avec succès');
        return redirect(route('admin.ingredient.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
