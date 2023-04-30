<?php

namespace App\Entity;

use App\Repository\ExpenseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpenseRepository::class)]
class Expense {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ExpenseCategory::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ExpenseCategory $category;

    #[ORM\Column]
    private float $amount;

    public function getCategory()
    : ExpenseCategory {

        return $this->category;
    }

    public function setCategory(ExpenseCategory $category)
    : void {

        $this->category = $category;
    }

    public function getAmount()
    : float {

        return $this->amount;
    }

    public function setAmount(float $amount)
    : void {

        $this->amount = $amount;
    }
}