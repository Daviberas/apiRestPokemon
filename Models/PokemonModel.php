<?php

class PokemonModel implements JsonSerializable
{
    private $pokedexNumber;
    private $name;
    private $type1;
    private $type2;

    public function __construct($pokedexNumber,$name,$type1,$type2)
    {
        $this->pokedexNumber = $pokedexNumber;
        $this->name = $name;
        $this->type1 = $type1;
        $this->type2 = $type2;
    }

    public function getPokedexNumber()
    {
        return $this->pokedexNumber;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType1()
    {
        return $this->type1;
    }

    public function getType2()
    {
        return $this->type2;
    }

    public function setPokedexNumber($pokedexNumber)
    {
        $this->pokedexNumber = $pokedexNumber;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setType1($type1)
    {
        $this->type1 = $type1;
    }

    public function setType2($type2)
    {
        $this->type2 = $type2;
    }

    function jsonSerialize()
    {
        return array
        (
            'pokedexNumber' => $this->pokedexNumber,
            'name' => $this->name,
            'type1' => $this->type1,
            'type2' => $this->type2
        );
    }

    public function __sleep()
    {
        return array('pokedexNumber' , 'name', 'type1', 'type2');
    }

}