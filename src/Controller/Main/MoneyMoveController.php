<?php

namespace App\Controller\Main;

use App\Entity\MoneyMove;
use App\Form\MoneyMoveFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MoneyMoveController extends AbstractController
{
    private const MONEY_TYPE =[
      'cost',
      'entry'
    ];
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    /**
     * @Route ("money", name="money")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $moneyRepository = $this->em->getRepository(MoneyMove::class);
        $status = $request->get('status');

        if(!in_array($status,self::MONEY_TYPE)){
            $this->addFlash(
                'notice',
                'error of type'
            );
            return $this->render('Main/money_move/index.html.twig',[
                'money'=>$moneyRepository->findAll()
            ]);
        }

        $moneyMoveTypeRepo = $this->em->getRepository(MoneyMoveFormType::class);
        return $this->render('Main/money_move/index.html.twig',[
            'money'=>$moneyRepository->findBy(['money_move_type'=>$moneyMoveTypeRepo->findOneBy(['name'=>"{$status}"])->getId()])
        ]);

    }

    /**
     * @Route ("/money/create", name="money_create")
     * @param Request $request
     * @return Response
     */
    public function createMoneyMove(Request $request):Response
    {
        $form = $this->createForm(MoneyMoveFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $money = $form->getData();
            $this->em->persist($money);
            $this->em->flush();
        }

        return $this->render('Main/money_move/create.html.twig',[
           'create_form'=>$form->createView()
        ]);
    }

}
