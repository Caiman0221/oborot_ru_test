<?php
    final class apple extends apple_tree
    {
        private $weight;
        private $type = 'apple';

        public function __construct(array $config) {
            $min_weight = $config['fruit_weight'][$this->type]['min'];
            $max_weight = $config['fruit_weight'][$this->type]['max'];
            $this->weight = rand($min_weight, $max_weight);
        }
        public function get_fruit_data() {
            return [
                'type' => $this->type,
                'weight' => $this->weight
            ];
        }
    }
    