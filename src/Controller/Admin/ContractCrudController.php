<?php

namespace App\Controller\Admin;

use App\Entity\Contract;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContractCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contract::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('contract_num');
        yield TextField::new('customer');
        yield TextField::new('address');
        yield DateField::new('created_at');
        yield DateField::new('deadline_at');
        yield NumberField::new('period');
        yield NumberField::new('pruduct_sum');
        yield NumberField::new('additional_sum');
        yield NumberField::new('product_work_sum');
        yield NumberField::new('additional_work_sum');
        yield NumberField::new('product_area');
        yield NumberField::new('product_num');
        yield NumberField::new('slopes_length');
        yield NumberField::new('slopes_width');
        yield BooleanField::new('is_done');

    }

}
