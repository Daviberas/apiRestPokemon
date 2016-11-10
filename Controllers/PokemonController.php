<?php

class PokemonController implements JsonSerializable
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

    /**
     * @return mixed
     */
    public function getPokedexNumber()
    {
        return $this->pokedexNumber;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getType1()
    {
        return $this->type1;
    }

    /**
     * @return mixed
     */
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * @param mixed $pokedexNumber
     */
    public function setPokedexNumber($pokedexNumber)
    {
        $this->pokedexNumber = $pokedexNumber;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $type1
     */
    public function setType1($type1)
    {
        $this->type1 = $type1;
    }

    /**
     * @param mixed $type2
     */
    public function setType2($type2)
    {
        $this->type2 = $type2;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
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