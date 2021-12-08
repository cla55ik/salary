<?php

namespace App\Controller\Admin;

use App\Entity\Contract;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;

class ContractCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contract::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('contract_num')
            ->setLabel('№');
        yield TextField::new('customer');
        yield TextField::new('address')
            ->onlyOnForms();
        yield DateField::new('created_at');
        yield DateField::new('deadline_at')
            ->onlyOnIndex();
        yield NumberField::new('period')
            ->onlyOnForms();
        yield NumberField::new('product_sum')
            ->setLabel('prod sum')
            ->onlyOnForms();
        yield NumberField::new('additional_sum')
            ->setLabel('add sum')
            ->onlyOnForms();
        yield NumberField::new('sum')
            ->onlyOnIndex()
            ->setLabel('SUM');
        yield NumberField::new('product_work_sum')
            ->setLabel('prod w sum');
        yield NumberField::new('additional_work_sum')
            ->setLabel('add w sum');
        yield NumberField::new('product_area')
            ->setLabel('area');
        yield NumberField::new('product_num')
            ->setLabel('count');
        yield NumberField::new('slopes_length')
            ->setLabel('slope l');
        yield NumberField::new('slopes_width')
            ->setLabel('slope w');
        yield AssociationField::new('worker_employee')
            ->setLabel('worker');
        yield BooleanField::new('is_done');

    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(BooleanFilter::new('is_done'))
            ->add('worker_employee')
            ;

    }



}
