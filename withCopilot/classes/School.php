<?php

/**
 * Instructions
 *
 * Given students' names along with the grade that they are in, create a roster for the school.
 *
 * In the end, you should be able to:
 *
 * Add a student's name to the roster for a grade
 * "Add Jim to grade 2."
 * "OK."
 *
 * Get a list of all students enrolled in a grade
 * "Which students are in grade 2?"
 * "We've only got Jim just now."
 *
 * Get a sorted list of all students in all grades. Grades should sort as 1, 2, 3, etc., and students within a grade should be sorted alphabetically by name.
 * "Who all is enrolled in school right now?"
 * "Let me think. We have Anna, Barb, and Charlie in grade 1, Alex, Peter, and Zoe in grade 2 and Jim in grade 5. So the answer is: Anna, Barb, Charlie, Alex, Peter, Zoe and Jim"
 *
 * Note that all our students only have one name. (It's a small town, what do you want?)
 */
class School
{
    public function add(string $name, int $grade): void
    {
        throw new \BadMethodCallException("Implement the add method");
    }

    public function grade($grade)
    {
        throw new \BadMethodCallException("Implement the grade method");
    }

    public function studentsByGradeAlphabetical(): array
    {
        throw new \BadMethodCallException("Implement the studentsByGradeAlphabetical method");
    }
}