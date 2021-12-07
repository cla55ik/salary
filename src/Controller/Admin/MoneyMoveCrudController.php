<?php

namespace App\Controller\Admin;

use App\Entity\MoneyMove;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MoneyMoveCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MoneyMove::class;
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
