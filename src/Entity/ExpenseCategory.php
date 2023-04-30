<?php

namespace App\Entity;

use App\Repository\ExpenseCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpenseCategoryRepository::class)]
class ExpenseCategory {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private string $name;

    public function __construct(string $name) {

        $this->name = $name;
    }

    public function getId()
    : ?int {

        return $this->id;
    }

    public function getName()
    : string {

        return $this->name;
    }
}