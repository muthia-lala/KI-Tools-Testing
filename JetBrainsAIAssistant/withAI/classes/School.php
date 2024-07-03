<?php

class School
{
	private $roster = [];

	public function add(string $name, int $grade) : void
	{
		$this->roster[$grade][] = $name;
		sort($this->roster[$grade]);
	}

	public function grade($grade)
	{
		if (isset($this->roster[$grade]))
		{
			return $this->roster[$grade];
		}

		return [];
	}

	public function studentsByGradeAlphabetical() : array
	{
		ksort($this->roster); // sort by grade

		return $this->roster;
	}
}
