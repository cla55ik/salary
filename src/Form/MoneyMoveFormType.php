<?php

namespace App\Form;

use App\Entity\MoneyMove;
use App\Repository\MoneyMoveTypeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\MoneyMoveType;

class MoneyMoveFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sum', NumberType::class)
            ->add('created_at',DateType::class,[
                'widget'=>'single_text'
            ])
            ->add('money_move_type', EntityType::class,[
                'label'=>'MoveType',
                'class'=>MoneyMoveType::class,
                'query_builder'=>function(MoneyMoveTypeRepository $repository){
                    return $repository->createQueryBuilder('c')
                        ->andWhere('c.name is not null');
                }
            ])
//            ->add('salary')
            ->add('money_owner')
            ->add('money_payer')
            ->add('purpose')
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MoneyMove::class,
        ]);
    }
}
