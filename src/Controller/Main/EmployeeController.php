<?php

namespace App\Controller\Main;

use App\Entity\Contract;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    /**
     * @Route("/employee", name="employee")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(): Response
    {
        return $this->render('Main/employee/index.html.twig', [
            'controller_name' => 'EmployeeController',
        ]);
    }

    /**
     * @Route ("/employee/assign/montage/{contract_id}", name="employee_assign_montage")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Doctrine\ORM\EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function assignMontageForContract(Request $request, EntityManagerInterface $em):Response
    {
        $contract = $em->getRepository(Contract::class)->find($request->get('contract_id'));

        if($contract == null){
            $this->addFlash(
                'notice',
                'Contract is not exists'
            );
            return $this->redirectToRoute('contract');
        }


    }
}
