
<?php
    class apple_tree extends tree
    {
        private $type = 'apple';
        private $data = [];

        public function __construct($config) {
            $fruits_count_min = $config['fruits_count_on_tree'][$this->type]['min'];
            $fruits_count_max = $config['fruits_count_on_tree'][$this->type]['max'];
            $fruits_count = rand($fruits_count_min, $fruits_count_max);

            for ($i = 0; $i < $fruits_count; $i++) {
                $fruit = new apple($config);
                $fruit_data = $fruit->get_fruit_data();
                array_push($this->data, $fruit_data);
            }
        }

        public function get_tree_data() : array {
            return [
                'type' => $this->type,
                'fruits' => $this->data
            ];
        }
    }