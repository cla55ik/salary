<?php

namespace App\Controller\Admin;

use App\Entity\MoneyMove;
use Doctrine\DBAL\Types\FloatType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use Symfony\Component\Validator\Constraints\DateTime;


class MoneyMoveCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MoneyMove::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Money')
            ->setEntityLabelInPlural('Moneys')
            ->setSearchFields(['sum'])
//            ->setDefaultSort(['createdAt'=>'DESC'])
            ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('money_move'))
            ;
    }



    public function configureFields(string $pageName): iterable
    {
        yield NumberField::new('sum');
        yield DateField::new('created_at');
//        yield AssociationField::new('money_move_type');
//        yield AssociationField::new('purpose');
//        yield AssociationField::new('pay_owner');
//        yield AssociationField::new('pay_recipient');
//        yield AssociationField::new('salary');

    }

}
