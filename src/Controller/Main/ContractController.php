<?php

namespace App\Controller\Main;


use App\Entity\Contract;
use App\Repository\ContractRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContractController extends AbstractController
{
    private ContractRepository $contractRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        ContractRepository $contractRepository
    )
    {
        $this->contractRepository = $contractRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @param ContractRepository $contractRepository
     * @return Response
     * @Route("/contract", name="contract")
     */
    public function index(ContractRepository $contractRepository):Response
    {
//        dd($contractRepository->findAll());
        return $this->render('Main/contract/index.html.twig', [
            'contracts' => $contractRepository->findAll()
        ]);
    }

    /**
     * @Route ("/contract/edit/{id}", name="contract_edit")
     * @param Contract $contract
     * @return Response
     */
    public function edit(Contract $contract):Response
    {
        return $this->render('Main/contract/edit.html.twig',[
            'contract'=> $contract
        ]);
    }

    /**
     * @Route ("/contract/{id}", name="contract_show")
     * @param Contract $contract
     * @return Response
     */
    public function show(Contract $contract):Response
    {
        return $this->render('Main/contract/show.html.twig', [
           'contract'=>$contract
        ]);
    }
}