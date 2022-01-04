<?php

declare(strict_types=1);

namespace App\Modules\Raw\Students;

class StudentsService
{
    /** @var StudentsRepository */
    private $repository;

    /**
     * @param StudentsRepository $repository
     */
    public function __construct(StudentsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->repository->getAll();
    }

    /**
     * @param int
     * @return Students
     */
    public function get(int $id): Students
    {
        return $this->repository->get($id);
    }

    /**
     * @param array $unvalidatedData
     * @return Students
     */
    public function update(array $unvalidatedData): Students
    {
        return $this->repository->update(StudentsMapper::mapFrom(array_merge($unvalidatedData)));
    }
}