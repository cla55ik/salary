<?php

namespace App\Controller\Admin;

use App\Entity\Contract;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
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
        yield NumberField::new('sum')
            ->setDisabled(true)
        ;
        yield NumberField::new('cost_all')
            ->setDisabled(true)
        ;
        yield NumberField::new('earning')
            ->setLabel('profit')
            ->setDisabled(true)
        ;
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
            ->setLabel('prod count');
        yield NumberField::new('slopes_length')
            ->setLabel('slope l');
        yield NumberField::new('slopes_width')
            ->setLabel('slope w');
        yield AssociationField::new('employee_worker')
            ->setLabel('worker');
        yield BooleanField::new('is_done');
        yield NumberField::new('cost_product')
            ->setLabel('Закупка продукта')
            ;
        yield NumberField::new('cost_additional')
            ->setLabel('Закупка доп')
            ;
        yield NumberField::new('cost_another')
            ->setLabel('прочие затраты')
            ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(BooleanFilter::new('is_done'))
            ->add('employee_worker')
            ;

    }



}
