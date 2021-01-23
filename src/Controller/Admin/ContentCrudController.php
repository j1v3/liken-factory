<?php
namespace App\Controller\Admin;

use App\Entity\Content;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContentCrudController extends AbstractCrudController
{
    // it must return a FQCN (fully-qualified class name) of a Doctrine ORM entity
    public static function getEntityFqcn(): string
    {
        return Content::class;
    }

    // ...
}
