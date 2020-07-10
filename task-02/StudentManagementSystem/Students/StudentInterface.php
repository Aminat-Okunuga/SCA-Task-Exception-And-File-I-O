<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 28-Jun-20
 * Time: 6:01 PM
 */

namespace Students;

interface StudentInterface{
    public function getName();
    public function getSex();
    public function getGrade();
}

abstract class Student implements StudentInterface{
    public function getName()
    {
        // TODO: Implement getName() method.
    return $this->getName();
    }
    public function getSex()
    {
        // TODO: Implement getSex() method.
    return $this->getSex();
    }
    public function getGrade()
    {
        // TODO: Implement getGrade() method.
    return $this->getGrade();
    }
}