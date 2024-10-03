<?php

class tree
{
    public static $trees_count = 1;
    private $id;
    private $type;
    private $data = [];
    public function __construct(string $type, array $config = []) {
        $this->id = self::$trees_count;
        ++self::$trees_count;

        switch ($type) {
            case 'pear':
                $tree = new pear_tree($config);
                $this->type = 'pear';
                break;
            case 'apple':
                $tree = new apple_tree($config);
                $this->type = 'apple';
                break;
        }
        $this->data = $tree->get_tree_data();
    }

    public function get_tree_data() : array {
        $result = [
            'id' => $this->id,
            'type' => $this->type,
            'tree' => $this->data
        ];
        return $result;
    }
}
