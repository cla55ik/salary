<?php

namespace App\Form;

use App\Entity\Contract;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContractFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('is_done')
            ->add('contract_num')
            ->add('customer')
            ->add('address')
            ->add('created_at')
            ->add('deadline_at')
            ->add('period')
            ->add('product_sum')
            ->add('additional_sum')
            ->add('product_work_sum')
            ->add('additional_work_sum')
            ->add('product_area')
            ->add('product_num')
            ->add('slopes_length')
            ->add('slopes_width')
            ->add('sum')
            ->add('cost_product')
            ->add('cost_additional')
            ->add('cost_another')
            ->add('cost_all')
            ->add('earning')
            ->add('worker_employee')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contract::class,
        ]);
    }
}
