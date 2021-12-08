<?php

namespace App\Controller\Admin;

use App\Entity\Purpose;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PurposeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Purpose::class;
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
