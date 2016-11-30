<?php

require_once "ConsTypeModel.php";

class TypeHandlerModel
{
    public static function getType($id)
    {
        $listaTypes = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $valid = self::isValid($id);

        if ($valid === true || $id == null)
        {
            $query = "SELECT " . \ConstantesDB\ConsTypeModel::ID . ","
                . \ConstantesDB\ConsTypeModel::NAME
                . " FROM " . \ConstantesDB\ConsTypeModel::TABLE_NAME;


            if ($id != null)
            {
                $query = $query . " WHERE " . \ConstantesDB\ConsTypeModel::ID . " = ?";
            }

            $prep_query = $db_connection->prepare($query);

            if ($id != null)
            {
                $prep_query->bind_param('s', $id);
            }

            $prep_query->execute();
            $listaTypes = array();

            $prep_query->bind_result($id, $name);
            $prep_query->store_result();
            while ($prep_query->fetch())
            {
                $name = utf8_encode($name);
                $type = new TypeModel($id,$name);
                $listaTypes[] = $type;
            }
        }
        $db->closeConnection();

        return $listaTypes;
    }

    public static function postType(TypeModel $type){
        $db=DatabaseModel::getInstance();
        $connection=$db->getConnection();
        $query="insert into ". \ConstantesDB\ConsTypeModel::TABLE_NAME.
            " (".\ConstantesDB\ConsTypeModel::ID.
            "," . \ConstantesDB\ConsTypeModel::NAME.
            ") values (".$type->getId().
            ",'".$type->getName()."');";
        $prep_query = $connection->prepare($query);
        $resultado=$prep_query->execute();
        $db->closeConnection();
        return $resultado;
    }

    public static function isValid($id)
    {
        $res = false;

        if (ctype_digit($id))
        {
            $res = true;
        }
        return $res;
    }
}