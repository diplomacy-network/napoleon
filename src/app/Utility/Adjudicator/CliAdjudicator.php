<?php

namespace App\Utility\Adjudicator;

use Exception;
use stdClass;
use Symfony\Component\Process\Process;

class CliAdjudicator implements AdjudicatorInterface {

    public static function getMeta(string $name): stdClass {
        $process = new Process([config('adjudicate.alex.path'), 'meta', "--variant={$name}"]);
        $process->run();
        if(!$process->isSuccessful()){
            throw new Exception($process->getErrorOutput());
        }

        return json_decode($process->getOutput());
     }

    public static function getInit(string $name): stdClass {
        $process = new Process([config('adjudicate.alex.path'), 'init', "--variant={$name}"]);
        $process->run();
        if(!$process->isSuccessful()){
            throw new Exception($process->getErrorOutput());
        }

        return json_decode($process->getOutput());
     }

    public static function getAdjudicated(string $name, mixed $data): stdClass {

     }

}
