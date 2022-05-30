<?php

namespace App\Support;

use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class GradeHsGradYear
{

    public readonly int $grade;
    public readonly int $year;

    #[Pure] public static function forGradYear(int $year): static
    {
        $instance = new static();
        $instance->grade = gradeFromHsGraduationYear($year);
        $instance->year = $year;
        return $instance;
    }

    #[Pure] public static function forGrades(Collection $grades): Collection
    {
        $collection = collect([]);
        foreach ($grades as $grade) {
            $collection->push(self::forGrade($grade));
        }
        return $collection;
    }

    #[Pure] public static function forGrade(int $grade): static
    {
        $instance = new static();
        $instance->grade = $grade;
        $instance->year = hsGraduationYearForGrade($instance->grade);
        return $instance;
    }

}
