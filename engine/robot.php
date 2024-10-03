<?php 
    final class robot
    {
        private $data = [];
        public function __construct($trees) {
            // "собираем фрукты" в массив $data
            foreach ($trees as $key => $tree) {
                $this->data[$key]['id'] = $tree['id'];
                $this->data[$key]['type'] = $tree['type'];
                $this->data[$key]['fruits'] = [];
                foreach ($tree['tree']['fruits'] as $fruit_fey => $fruit) {
                    $this->data[$key]['fruits'][$fruit_fey]['weight'] = $fruit['weight'];
                }
            }
        }
        public function get_apples_count() : int {
            $count = 0;
            foreach ($this->data as $key => $tree) {
                if ($tree['type'] === 'apple') $count += count($tree['fruits']);
            }
            return $count;
        }
        public function get_pears_count() : int{
            $count = 0;
            foreach ($this->data as $key => $tree) {
                if ($tree['type'] === 'pear') $count += count($tree['fruits']);
            }
            return $count;
        }
        public function get_fruits_count() : array{
            $result = [];
            $result['apples_count'] = $this->get_apples_count();
            $result['pears_count'] = $this->get_pears_count();
            $result['fruits_count'] = $result['apples_count'] + $result['pears_count'];

            return $result;
        }
        public function get_apples_wieght() : int{
            $weight = 0;
            foreach ($this->data as $key => $tree) {
                if ($tree['type'] === 'apple') {
                    foreach ($tree['fruits'] as $fruit_key => $fruit) {
                        $weight += $fruit['weight'];
                    }
                }
            }
            return $weight;
        }
        public function get_pears_wieght() : int{
            $weight = 0;
            foreach ($this->data as $key => $tree) {
                if ($tree['type'] === 'pear') {
                    foreach ($tree['fruits'] as $fruit_key => $fruit) {
                        $weight += $fruit['weight'];
                    }
                }
            }
            return $weight;
        }
        public function get_fruits_wieght() : array {
            $result = [];
            $result['apples_weight'] = $this->get_apples_wieght();
            $result['pears_weight'] = $this->get_pears_wieght();
            $result['fruits_weight'] = $result['apples_weight'] + $result['pears_weight'];
            return $result;
        }
        public function get_heaviest_fruit() {
            $result = [
                'tree_id' => 0,
                'tree_type' => '',
                'fruit_weight' => 0
            ];

            foreach ($this->data as $key => $tree) {
                foreach ($tree['fruits'] as $fruit_key => $fruit) {
                    if ($fruit['weight'] > $result['fruit_weight']) {
                        $result = [
                            'tree_id' => $tree['id'],
                            'tree_type' => $tree['type'],
                            'fruit_weight' => $fruit['weight']
                        ];
                    }
                }
            }
            return $result;
        }
    }
    