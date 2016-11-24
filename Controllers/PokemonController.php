<?php

require_once "Controller.php";

class PokemonController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaPokemon = null;
        $id = null;
        $response = null;
        $code = null;

        if (isset($request->getUrlElements()[2]))
        {
            $id = $request->getUrlElements()[2];
        }


        $listaPokemon = PokemonHandlerModel::getPokemon($id);

        if ($listaPokemon != null)
        {
            $code = '200';

        }
        else
            {

                if (PokemonHandlerModel::isValid($id))
                {
                $code = '404';
                }
                else
                {
                    $code = '400';
                }
        }

        $response = new Response($code, null, $listaPokemon, $request->getAccept());
        $response->generate();

    }
}