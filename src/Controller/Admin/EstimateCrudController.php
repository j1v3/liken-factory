<?php
namespace App\Controller\Admin;

use App\Entity\Estimate;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EstimateCrudController extends AbstractCrudController
{
    // it must return a FQCN (fully-qualified class name) of a Doctrine ORM entity
    public static function getEntityFqcn(): string
    {
        return Estimate::class;
    }

    // ...
}
