<?php

namespace App\Controller\Admin;

use App\Entity\Employees;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmployeesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employees::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield BooleanField::new('is_active');


    }

}
