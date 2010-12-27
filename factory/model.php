<?php

/*
 * Base class for models
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

abstract class bimtwo_base_model {
    
    /** @var bimtwo_base_controller controller **/
    /*  The controller that created this model */
    public $controller;

    /** @var bimtwo_factory factory producing controller **/
    /*  - provides access to $cm, $course, $context, $bimtwo objects */
    public $factory;

    function __construct( $controller ) {
        $this->controller = $controller;
        $this->factory = $controller->factory;
    }

    /*
     * This is where the actual output should be generated
     */
    abstract function gather_data(); 
}

    
?>
