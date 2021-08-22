<?php

namespace Idea\Manager;

use Idea\Manager\Admin\Wp_Idea;

class Admin {
    /**
     * Class constructor
     */
    public function __construct() {
        new Wp_Idea();
    }
}