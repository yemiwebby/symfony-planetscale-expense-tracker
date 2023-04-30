<?php

namespace App\Controller;

use App\Entity\Expense;
use App\Form\ExpenseType;
use App\Repository\ExpenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/expense/', name: 'app_expense_')]
class ExpenseController extends AbstractController {

    #[Route('', name: 'index', methods: ['GET'])]
    public function index(ExpenseRepository $expenseRepository)
    : Response {

        return $this->render('expense/index.html.twig', [
            'expenses' => $expenseRepository->groupedExpenses(),
        ]);
    }

    #[Route('new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, ExpenseRepository $expenseRepository)
    : Response {

        $form = $this->createForm(ExpenseType::class, new Expense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $expense = $form->getData();
            $expenseRepository->save($expense, true);

            return $this->redirectToRoute('app_expense_index');
        }

        return $this->render('expense/new.html.twig', ['form' => $form]);
    }

    #[Route('all', name: 'all', methods: ['GET'])]
    public function all(ExpenseRepository $expenseRepository)
    : Response {

        return $this->render('expense/all.html.twig', [
            'expenses' => $expenseRepository->findAll(),
        ]);
    }
}