<?php
namespace App\Controller\Admin;

use App\Entity\SurveyItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SurveyItemCrudController extends AbstractCrudController
{
    // it must return a FQCN (fully-qualified class name) of a Doctrine ORM entity
    public static function getEntityFqcn(): string
    {
        return SurveyItem::class;
    }

    // ...
}
