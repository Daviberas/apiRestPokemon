<?php

/**
 * Created by PhpStorm.
 * User: dbenitez
 * Date: 10/11/16
 * Time: 10:31
 */
class TypeModel implements JsonSerializable
{
    private $id;
    private $name;

    public function __construct($id,$name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
            'id' => $this->id,
            'name' => $this->name
        );
    }

    public function __sleep()
    {
        return array('id' , 'name');
    }
}