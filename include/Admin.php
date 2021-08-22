<?php

namespace Idea\Manager;

use Idea\Manager\Admin\Wp_Im_Idea;

/**
 *
 */
class Admin {
    public function __construct() {
        new Wp_Im_Idea();
    }
}