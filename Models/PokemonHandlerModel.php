<?php

require_once "ConsPokemonModel.php";

class PokemonHandlerModel
{

    public static function getPokemon($id)
    {
        $listaPokemon = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $valid = self::isValid($id);

        if ($valid === true || $id == null) {
            $query = "SELECT " . \ConstantesDB\ConsPokemonModel::NUM . ","
                . \ConstantesDB\ConsPokemonModel::NAME . ","
                . \ConstantesDB\ConsPokemonModel::TYPE1. ","
                . \ConstantesDB\ConsPokemonModel::TYPE2 . ","
                . " FROM " . \ConstantesDB\ConsPokemonModel::TABLE_NAME;


            if ($id != null) {
                $query = $query . " WHERE " . \ConstantesDB\ConsPokemonModel::NUM . " = ?";
            }

            $prep_query = $db_connection->prepare($query);

            if ($id != null) {
                $prep_query->bind_param('s', $id);
            }

            $prep_query->execute();
            $listaPokemon = array();

            $prep_query->bind_result($num, $name, $type1, $type2);
            while ($prep_query->fetch()) {
                $name = utf8_encode($name);
                $pokemon = new PokemonModel($num,$name,$type1,$type2);
                $listaPokemon[] = $pokemon;
            }
        }
        $db_connection->close();

        return $listaPokemon;
    }


    public static function isValid($id)
    {
        $res = false;

        if (ctype_digit($id)) {
            $res = true;
        }
        return $res;
    }

}