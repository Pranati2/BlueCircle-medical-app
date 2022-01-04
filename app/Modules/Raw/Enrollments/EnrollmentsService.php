<?php

declare(strict_types=1);

namespace App\Modules\Raw\Enrollments;

class EnrollmentsService
{
    /** @var EnrollmentsRepository */
    private $repository;

    /**
     * @param EnrollmentsRepository $repository
     */
    public function __construct(EnrollmentsRepository $repository)
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
    public function get(int $id): Enrollments
    {
        return $this->repository->get($id);
    }

    /**
     * @param array $unvalidatedData
     * @return Students
     */
    public function update(array $unvalidatedData): Enrollments
    {
        return $this->repository->update(EnrollmentsMapper::mapFrom(array_merge($unvalidatedData)));
    }
}