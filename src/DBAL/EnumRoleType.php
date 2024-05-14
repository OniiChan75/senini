<?php

namespace App\DBAL;

class EnumRoleType extends EnumType
{
    protected $name = 'enumrole';
    protected $values = array('admin', 'normal');
}