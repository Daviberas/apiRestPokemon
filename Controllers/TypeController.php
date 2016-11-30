<?php

require_once "Controller.php";

class TypeController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaTypes = null;
        $id = null;
        $response = null;
        $code = null;

        if (isset($request->getUrlElements()[2]))
        {
            $id = $request->getUrlElements()[2];
        }


        $listaTypes = TypeHandlerModel::getType($id);

        if ($listaTypes != null)
        {
            $code = '200';

        }
        else
        {

            if (TypeHandlerModel::isValid($id))
            {
                $code = '404';
            }
            else
            {
                $code = '400';
            }

        }

        $response = new Response($code, null, $listaTypes, $request->getAccept());
        $response->generate();

    }

    public function managePostVerb(Request $request)
    {
        $response=null;
        $code=null;
        $resultado=null;
        $type=null;
        $id = $request->getBodyParameters()[0]->id;
        $name = $request->getBodyParameters()[0]->name;
        $type= new TypeModel($id,$name);
        $resultado=TypeHandlerModel::postType($type);

        if ($request != null)
        {
            $code = '200';
        }
        else
        {
            $code = '400';
        }

        $response = new Response($code, null, $resultado, $request->getAccept());
        $response->generate();
    }
}