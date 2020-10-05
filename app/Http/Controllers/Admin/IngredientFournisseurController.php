<?php
namespace App\Http\Controllers\admin;

use App\IngredientFournisseur;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class IngredientFournisseurController extends Controller
{
    public $viewDir = "admin.ingredient_fournisseur";

    public function index()
    {
        $records = IngredientFournisseur::findRequested();
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
        $this->validate($request, IngredientFournisseur::validationRules());

        IngredientFournisseur::create($request->all());

        # notification
        Notify::success('Ingredient Fournisseur a été créer avec succès');
        return redirect(route('admin.ingredient-fournisseur.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, IngredientFournisseur $ingredientFournisseur)
    {
        return $this->view("show",['ingredientFournisseur' => $ingredientFournisseur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, IngredientFournisseur $ingredientFournisseur)
    {
        return $this->view( "edit", ['ingredientFournisseur' => $ingredientFournisseur] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, IngredientFournisseur $ingredientFournisseur)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, IngredientFournisseur::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $ingredientFournisseur->update($data);
            return "Record updated";
        }

        $this->validate($request, IngredientFournisseur::validationRules());

        $ingredientFournisseur->update($request->all());

        # notification
        Notify::success('Ingredient Fournisseur a été mise à jour avec succès');
        return redirect(route('admin.ingredient-fournisseur.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, IngredientFournisseur $ingredientFournisseur)
    {
        $ingredientFournisseur->delete();

        # notification
        Notify::success('Ingredient Fournisseur a été supprimer avec succès');
        return redirect(route('admin.ingredient-fournisseur.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
