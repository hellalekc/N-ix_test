<?php

class gameOfLife
{
    private int $x;
    private int $y;

    private int $countSteps;

    public array $result;

    public function __construct($x,$y,$arr, $countSteps){
        $this->x = $x;
        $this->y = $y;
        $this->countSteps = $countSteps;
        $this->result[0] = $arr;
    }

    private function step($arr): array
    {
        $result = [];
        for ($i = 0; $i < $this->x; $i++) {
            for ($j = 0; $j < $this->y; $j++) {
                $sum = 0;
                $smxMax = $i + 1;
                $smyMax = $j + 1;
                for ($k = $smxMax - 2; $k <= $smxMax; $k++) {
                    for ($l = $smyMax - 2; $l <= $smyMax; $l++) {
                        if ($k == $i && $l == $j) {
                            continue;
                        }
                        $sum += $arr[$k][$l] ?? 0;
                    }
                }
                $result[$i][$j] = $arr[$i][$j] ? (int)(2 < $sum && $sum < 4) : (int)($sum == 3);
            }
        }

        return $result;
    }
    public function start()
    {
        for ($i = 0; $i<$this->countSteps; $i++){
            $this->result[$i+1] = $this->step($this->result[$i]);
            var_dump($this->result[$i]);
        }
    }
    public function getResult($step = false){
        if($step){
            if(isset($this->result[$step])){
                var_dump($this->result[$step]);
            }
            else{
                echo "We don't have this step";
            }
        }else{
            var_dump($this->result);
        }

    }
}