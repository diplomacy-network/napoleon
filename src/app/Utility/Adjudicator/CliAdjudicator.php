<?php

namespace App\Utility\Adjudicator;

use Symfony\Component\Process\Process;

class CliAdjudicator implements AdjudicatableInterface {

    public static function getMeta(string $name) {
        $process = new Process(['alex', 'meta', '--variant=Classical']);
        $process->run();
        if(!$process->isSuccessful()){
            return $process->getErrorOutput();
        }

        return json_decode($process->getOutput());
     }

    public static function getInit(string $name): array {

     }

    public static function getAdjudicated(string $name, mixed $data): array {

     }
    
}
