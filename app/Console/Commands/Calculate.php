<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Calculate extends Command
{
    protected $signature = 'calculate:values';

    protected $description = 'Calculate factorial and odd numbers';

    public function handle()
    {
        $nilaiFactorial = 7;
        $factorial = $this->calculateFactorial($nilaiFactorial);

        $nilaiGanjil = 20;
        $oddNumbers = $this->getOddNumbers($nilaiGanjil);

        $this->info("Nilai faktorial dari $nilaiFactorial adalah: $factorial");
        $this->info("Bilangan ganjil dari 1 sampai $nilaiGanjil adalah: " . implode(', ', $oddNumbers));
    }

   
    private function calculateFactorial($n)
    {
        $factorial = 1;
        for ($i = 1; $i <= $n; $i++) {
            $factorial *= $i;
        }
        return $factorial;
    }

    
    private function getOddNumbers($n)
    {
        $oddNumbers = [];
        for ($i = 1; $i <= $n; $i++) {
            if ($i % 2 !== 0) {
                $oddNumbers[] = $i;
            }
        }
        return $oddNumbers;
    }
}
