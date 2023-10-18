<?php
    class Statistic {
        public $arr_input;

        public function __construct(array $arr_input){
            $this->arr_input = $arr_input;
        }

        public function bubbleSort(){
            $count_arr = count($this->arr_input);

            for ($i = 0; $i < $count_arr - 1; $i++) {
                for ($j = 0; $j < $count_arr - $i - 1; $j++) {
                    if ($this->arr_input[$j] > $this->arr_input[$j + 1]) {
                        $temp = $this->arr_input[$j];
                        $this->arr_input[$j] = $this->arr_input[$j + 1];
                        $this->arr_input[$j + 1] = $temp;
                    }
                }
            }

            return $this->arr_input;
        }

        public function median(){
            $sorted_arr = $this->bubbleSort();
            $count_sort_arr = count($sorted_arr);

            if ($count_sort_arr % 2 == 0) {
                $mid1 = $sorted_arr[($count_sort_arr / 2) - 1];
                $mid2 = $sorted_arr[$count_sort_arr / 2];
                $median = ($mid1 + $mid2) / 2;
            } else {
                $median = $sorted_arr[floor($count_sort_arr / 2)];
            }

            return $median;
        }

        public function largest(){
            $sorted_arr = $this->bubbleSort();
            $largest = $sorted_arr[0];

            foreach($sorted_arr as $val){
                if ($val > $largest) {
                    $largest = $val;
                }
            }

            return $largest;
        }
    }

    class Display {

        public function getSort($unsort_arr){
            $statistic = new Statistic($unsort_arr);
            
            return $statistic->bubbleSort();
        }

        public function getMedian($unsort_arr){
            $statistic = new Statistic($unsort_arr);
            
            return $statistic->median();
        }

        public function getLargest($unsort_arr){
            $statistic = new Statistic($unsort_arr);
            
            return $statistic->largest();
        }
    }

    $unsort_arr = [13, 2, 1, 10, 12];
    
    $display = new Display();

    $sorted_arr = $display->getSort($unsort_arr);
    $median = $display->getMedian($unsort_arr);
    $largest = $display->getLargest($unsort_arr);
    
    print_r($sorted_arr);
    echo "MEDIAN: ".$median."\n";
    echo "LARGEST: ".$largest;

?>