<?php

declare(strict_types=1);

namespace App\Modules\Raw\Enrollments;

class Enrollments
{
    /** @var int|null */
    private $id;
    /** @var int */
    private $studentsId;
    /** @var int */
    private $coursesId;
    /** @var int */
    private $enrolledByUserId;
    /** @var string */
    private $createdAt;
    /** @var string|null */
    private $updatedAt;

    function __construct(
        ?int $id,
        int $studentsId,
        int $coursesId,
        int $enrolledByUserId,
        string $createdAt,
        ?string $updatedAt
    ) {
        $this->id = $id;
        $this->studentsId = $studentsId;
        $this->coursesId = $coursesId;
        $this->enrolledByUserId = $enrolledByUserId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    } //end __construct()

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentsId(): int
    {
        return $this->studentsId;
    }
    public function getCoursesId(): int
    {
        return $this->coursesId;
    }
    public function getEnrolledByUserId(): int
    {
        return $this->enrolledByUserId;
    }
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function toArray(): array
    {
        return [
            'id'              => $this->id,
            'students_id' => $this->studentsId,
            'courses_id' => $this->coursesId,
            'enrolled_by_users_id' => $this->enrolledByUserId,
            'created_at'  => $this->createdAt,
            'updated_at'  => $this->updatedAt,
        ];
    }

    public function toSQL(): array
    {
        return [
            'id' => $this->id,
            'students_id' => $this->studentsId,
            'courses_id' => $this->coursesId,
            'enrolled_by_users_id' => $this->enrolledByUserId,
            'created_at'  => $this->createdAt,
            'updated_at'  => $this->updatedAt,
        ];
    }
}//end class