<?php

namespace App\Controller\Admin;

use App\Entity\MoneyMoveType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MoneyMoveTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MoneyMoveType::class;
    }


    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
