<?php

declare(strict_types=1);

namespace App\Modules\Raw\Students;

use App\Modules\Raw\Courses\Courses;

class Students
{
    /** @var int|null */
    private $id;
    /** @var string */
    private $name;
    /** @var array */
    private $courses;
    /** @var string */
    private $createdAt;
    /** @var string|null */
    private $updatedAt;

    function __construct(
        ?int $id,
        string $name,
        array $courses,
        string $createdAt,
        ?string $updatedAt
    ) {
        $this->id             = $id;
        $this->name           = $name;
        $this->courses           = $courses;
        $this->createdAt      = $createdAt;
        $this->updatedAt      = $updatedAt;
    } //end __construct()

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getCourses(): array
    {
        return $this->courses;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function toArray(): array
    {
        return [
            'id'              => $this->id,
            'name' => $this->name,
            "courses" => array_map(function ($row) {
                return $row->toArray();
            }, $this->courses),
            'created_at'  => $this->createdAt,
            'updated_at'  => $this->updatedAt,
        ];
    }

    public function toSQL(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at'  => $this->createdAt,
            'updated_at'  => $this->updatedAt,
        ];
    }
}//end class