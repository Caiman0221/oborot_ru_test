<?php 
    $realpath = realpath('');
    include($realpath . '/autoload.php');

    use PHPUnit\Framework\TestCase;

    final class testTree extends TestCase
    {
        private $config = [
            'trees_count' => [
                'apple' => 10,
                'pear' => 15
            ],
            'fruits_count_on_tree' => [
                'apple' => [
                    'min' => 40,
                    'max' => 50
                ],
                'pear' => [
                    'min' => 0,
                    'max' => 20
                ]
            ],
            'fruit_weight' => [
                'apple' => [
                    'min' => 150,
                    'max' => 180
                ],
                'pear' => [
                    'min' => 130,
                    'max' => 170
                ]
            ]
        ];
        public function testApple() : void {
            $output = [
                'type' => 'apple',
                'weight' => 0
            ];
            $apple = new apple($this->config);
            
            $this->assertArrayHasKey('type', $apple->get_fruit_data());
            $this->assertArrayHasKey('weight', $apple->get_fruit_data());
            $this->assertEquals($output['type'], ($apple->get_fruit_data())['type']);
            $this->assertIsInt(($apple->get_fruit_data())['weight']);
        }
        public function testAppleTree() {
            $output = [
                'type' => 'apple',
                'fruits' => [],
            ];

            $apple_tree = new apple_tree($this->config);

            $this->assertArrayHasKey('type', $apple_tree->get_tree_data());
            $this->assertArrayHasKey('fruits', $apple_tree->get_tree_data());
            $this->assertEquals($output['type'], ($apple_tree->get_tree_data())['type']);
            $this->assertIsArray(($apple_tree->get_tree_data())['fruits']);
        }
        public function testPear() : void {
            $output = [
                'type' => 'pear',
                'weight' => 0
            ];
            $pear = new pear($this->config);
            
            $this->assertArrayHasKey('type', $pear->get_fruit_data());
            $this->assertArrayHasKey('weight', $pear->get_fruit_data());
            $this->assertEquals($output['type'], ($pear->get_fruit_data())['type']);
            $this->assertIsInt(($pear->get_fruit_data())['weight']);
        }
        public function testPearTree() {
            $output = [
                'type' => 'pear',
                'fruits' => [],
            ];

            $pear_tree = new pear_tree($this->config);

            $this->assertArrayHasKey('type', $pear_tree->get_tree_data());
            $this->assertArrayHasKey('fruits', $pear_tree->get_tree_data());
            $this->assertEquals($output['type'], ($pear_tree->get_tree_data())['type']);
            $this->assertIsArray(($pear_tree->get_tree_data())['fruits']);
        }
        public function testTreeApple() {
            $output = [
                'id' => 0,
                'type' => '',
                'tree' => [],
            ];

            $tree = new tree('apple', $this->config);

            $this->assertArrayHasKey('id', $tree->get_tree_data());
            $this->assertArrayHasKey('type', $tree->get_tree_data());
            $this->assertArrayHasKey('tree', $tree->get_tree_data());
            $this->assertIsInt(($tree->get_tree_data())['id']);
            $this->assertIsString(($tree->get_tree_data())['type']);
            $this->assertIsArray(($tree->get_tree_data())['tree']);
        }
        public function testTreePear() {
            $output = [
                'id' => 0,
                'type' => '',
                'tree' => [],
            ];

            $tree = new tree('pear', $this->config);

            $this->assertArrayHasKey('id', $tree->get_tree_data());
            $this->assertArrayHasKey('type', $tree->get_tree_data());
            $this->assertArrayHasKey('tree', $tree->get_tree_data());
            $this->assertIsInt(($tree->get_tree_data())['id']);
            $this->assertIsString(($tree->get_tree_data())['type']);
            $this->assertIsArray(($tree->get_tree_data())['tree']);
        }
        
    }
    