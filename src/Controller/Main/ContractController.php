<?php

namespace App\Controller\Main;


use App\Entity\Contract;
use App\Form\ContractFormType;
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
     * @param Request $request
     * @return Response
     * @Route("/contract", name="contract", methods={"GET"})
     */
    public function index(ContractRepository $contractRepository, Request $request):Response
    {
        if($request->get('status') == 'is_done'){
            return $this->render('Main/contract/index.html.twig', [
               'contracts' => $contractRepository->findAllIsDone()
            ]);
        }

        if($request->get('status') == 'not_done'){
            return $this->render('Main/contract/index.html.twig', [
               'contracts' => $contractRepository->findAllNotDone()
            ]);
        }

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
        $form = $this->createForm(ContractFormType::class);

        return $this->render('Main/contract/edit.html.twig',[
            'contract'=> $contract,
            'contract_form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/contract/{id}", name="contract_show", requirements={"id"="\d+"})
     * @param Contract $contract
     * @return Response
     */
    public function show(Contract $contract):Response
    {
        return $this->render('Main/contract/show.html.twig', [
           'contract'=>$contract,

        ]);
    }

    /**
     * @Route("/contract/create", name="create_contract")
     * @param Request $request
     * @return Response
     */
    public function createContract(Request $request):Response
    {
        $form = $this->createForm(ContractFormType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $contract = $form->getData();
            $this->entityManager->persist($contract);
            $this->entityManager->flush();
            return $this->redirectToRoute('contract');

        }

        return $this->render('Main/contract/create.html.twig',[
           'create_form'=>$form->createView()
        ]);

    }
}