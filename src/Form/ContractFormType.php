<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Contract;
use App\Entity\Employees;
use App\Repository\CompanyRepository;
use App\Repository\EmployeesRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContractFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->add('is_done',CheckboxType::class)
            ->add('owner',EntityType::class, [
                'label'=>'Company',
                'class'=>Company::class,
                'query_builder'=>function(CompanyRepository $repository){
                    return $repository->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                    },
                'choice_label'=>'name',
                'attr'=>['data-selected'=>'true', 'class'=>'register-form-select']
            ])
            ->add('contract_num', TextType::class)
            ->add('customer',TextType::class)
//            ->add('address', TextType::class)
            ->add('created_at', DateType::class,[
                'widget' => 'single_text',
            ])
            ->add('period', NumberType::class)
            ->add('baseSum', NumberType::class)
            ->add('productArea', NumberType::class)
            ->add('slopesLength', NumberType::class)
            ->add('slopesWidth', NumberType::class)
            ->add('additionalSum', NumberType::class)
            ->add('sum', NumberType::class)
            ->add('prepayment', NumberType::class)
            ->add('manager',EntityType::class,[
                'label'=>'Manager',
                'class'=>Employees::class,
                'query_builder'=>function(EmployeesRepository $repository){
                    return $repository->createQueryBuilder('c')
                        ->andWhere('c.is_active=true')
                        ->andWhere('c.employee_post=1')
                        ->orderBy('c.name','ASC');
                },
                'choice_label'=>'name',
                'attr'=>['data-selected'=>'true', 'class'=>'register-form-select']
            ])
            ->add('measuring',EntityType::class,[
                'label'=>'Measuring',
                'class'=>Employees::class,
                'query_builder'=>function(EmployeesRepository $repository){
                    return $repository->createQueryBuilder('c')
                        ->andWhere('c.is_active=true')
                        ->andWhere('c.employee_post=3')
                        ->orderBy('c.name','ASC');
                },
                'choice_label'=>'name',
                'attr'=>['data-selected'=>'true', 'class'=>'register-form-select']
            ])
//            ->add('period', NumberType::class)
//            ->add('product_sum', NumberType::class)
//            ->add('additional_sum', NumberType::class)
//            ->add('product_work_sum',NumberType::class)
//            ->add('additional_work_sum', NumberType::class)
//            ->add('product_area', NumberType::class)
//            ->add('product_num', NumberType::class)
//            ->add('slopes_length', NumberType::class)
//            ->add('slopes_width', NumberType::class)
//            ->add('sum', NumberType::class)
//            ->add('cost_product', NumberType::class)
//            ->add('cost_additional', NumberType::class)
//            ->add('cost_another', NumberType::class)
//            ->add('cost_all', NumberType::class)
//            ->add('earning', NumberType::class)
//            ->add('employeeWorker', EntityType::class, [
//                'label'=>'Worker',
//                'class'=>Employees::class,
//                'query_builder'=>function(EmployeesRepository $repository){
//                    return $repository->createQueryBuilder('c')
//                        ->andWhere('c.is_active=true')
//                        ->andWhere('c.employee_post=2')
//                        ->orderBy('c.name', 'ASC');
//                },
//                'choice_label'=>'name',
//                'attr'=>['data-select'=>'true','class'=>'register-form-select']
//            ])
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contract::class,
        ]);
    }
}
