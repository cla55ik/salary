<?php

namespace App\Controller\Admin;

use App\Entity\Salary;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class SalaryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Salary::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield DateField::new('created_at')
        ->onlyOnIndex();
        yield NumberField::new('sum');
        yield AssociationField::new('employee');
        yield AssociationField::new('salary_type');

    }

}
