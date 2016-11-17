<?php

class TypeController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaTypes = null;
        $id = null;
        $response = null;
        $code = null;

        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }


        $listaTypes = TypeHandlerModel::getType($id);

        if ($listaTypes != null) {
            $code = '200';

        } else {

            if (TypeHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, null, $listaTypes, $request->getAccept());
        $response->generate();

    }
}