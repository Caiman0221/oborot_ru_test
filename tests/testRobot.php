<?php 
    $realpath = realpath('');
    include($realpath . '/autoload.php');

    use PHPUnit\Framework\TestCase;

    final class testRobot extends TestCase
    {
        private $trees = [
            0 => [
                'id' => 1,
                'type' => 'apple',
                'tree' => [
                    'type' => 'apple',
                    'fruits' => [
                        0 => [
                            'type' => 'apple',
                            'weight' => 157,
                        ],
                        1 => [
                            'type' => 'apple',
                            'weight' => 162,
                        ]
                    ]
                ]
            ],
            1 => [
                'id' => 2,
                'type' => 'pear',
                'tree' => [
                    'type' => 'pear',
                    'fruits' => [
                        0 => [
                            'type' => 'pear',
                            'weight' => 132,
                        ],
                        1 => [
                            'type' => 'pear',
                            'weight' => 133,
                        ]
                    ]
                ]
            ]
        ];

        public function testApplesCount() : void {
            $output = 2;
            $robot = new robot($this->trees);
            $result = $robot->get_apples_count();

            $this->assertIsInt($result);
            $this->assertEquals($output, $result);
        }
        public function testPearsCount() : void {
            $output = 2;
            $robot = new robot($this->trees);
            $result = $robot->get_pears_count();

            $this->assertIsInt($result);
            $this->assertEquals($output, $result);
        }
        public function testFruitsCount() : void {
            $output = [
                'apples_count' => 2,
                'pears_count' => 2,
                'fruits_count' => 4
            ];
            $robot = new robot($this->trees);
            $result = $robot->get_fruits_count();

            $this->assertArrayHasKey('apples_count', $result);
            $this->assertArrayHasKey('pears_count', $result);
            $this->assertArrayHasKey('fruits_count', $result);

            $this->assertIsInt($result['apples_count']);
            $this->assertEquals($output['apples_count'], $result['apples_count']);
            
            $this->assertIsInt($result['pears_count']);
            $this->assertEquals($output['pears_count'], $result['pears_count']);
            
            $this->assertIsInt($result['fruits_count']);
            $this->assertEquals($output['fruits_count'], $result['fruits_count']);
        }
        public function testApplesWeight() : void {
            $output = 319;
            $robot = new robot($this->trees);
            $result = $robot->get_apples_wieght();

            $this->assertIsInt($result);
            $this->assertEquals($output, $result);
        }
        public function testPearsWeight() : void {
            $output = 265;
            $robot = new robot($this->trees);
            $result = $robot->get_pears_wieght();

            $this->assertIsInt($result);
            $this->assertEquals($output, $result);
        }
        public function testFruitsWeight() : void {
            $output = [
                'apples_weight' => 319,
                'pears_weight' => 265,
                'fruits_weight' => 584
            ];

            $robot = new robot($this->trees);
            $result = $robot->get_fruits_wieght();

            $this->assertArrayHasKey('apples_weight', $result);
            $this->assertArrayHasKey('pears_weight', $result);
            $this->assertArrayHasKey('fruits_weight', $result);

            $this->assertIsInt($result['apples_weight']);
            $this->assertEquals($output['apples_weight'], $result['apples_weight']);
            
            $this->assertIsInt($result['pears_weight']);
            $this->assertEquals($output['pears_weight'], $result['pears_weight']);
            
            $this->assertIsInt($result['fruits_weight']);
            $this->assertEquals($output['fruits_weight'], $result['fruits_weight']);
        }
        public function testHeaviestFruit() : void {
            $output = [
                'tree_id' => 1,
                'tree_type' => 'apple',
                'fruit_weight' => 162
            ];

            $robot = new robot($this->trees);
            $result = $robot->get_heaviest_fruit();

            $this->assertArrayHasKey('tree_id', $result);
            $this->assertArrayHasKey('tree_type', $result);
            $this->assertArrayHasKey('fruit_weight', $result);

            $this->assertIsInt($result['tree_id']);
            $this->assertEquals($output['tree_id'], $result['tree_id']);
            
            $this->assertIsString($result['tree_type']);
            $this->assertEquals($output['tree_type'], $result['tree_type']);
            
            $this->assertIsInt($result['fruit_weight']);
            $this->assertEquals($output['fruit_weight'], $result['fruit_weight']);
        }
    }
    