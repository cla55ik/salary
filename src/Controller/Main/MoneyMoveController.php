<?php

namespace App\Controller\Main;

use App\Entity\MoneyMove;
use App\Entity\MoneyMoveType;
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

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }

    /**
     * @Route ("money_move", name="money_move")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $moneyRepository = $entityManager->getRepository(MoneyMove::class);
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

        $moneyMoveTypeRepo = $entityManager->getRepository(MoneyMoveType::class);
        return $this->render('Main/money_move/index.html.twig',[
            'money'=>$moneyRepository->findBy(['money_move_type'=>$moneyMoveTypeRepo->findOneBy(['name'=>"{$status}"])->getId()])
        ]);




    }

}
