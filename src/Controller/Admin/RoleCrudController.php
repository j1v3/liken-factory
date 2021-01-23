<?php
namespace App\Controller\Admin;

use App\Entity\Role;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RoleCrudController extends AbstractCrudController
{
    // it must return a FQCN (fully-qualified class name) of a Doctrine ORM entity
    public static function getEntityFqcn(): string
    {
        return Role::class;
    }

    // ...
}
