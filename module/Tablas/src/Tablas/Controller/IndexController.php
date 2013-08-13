<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      https://github.com/CookieShop for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://www.gnu.org/licenses/gpl.html GNU GENERAL PUBLIC LICENSE
 */
namespace Tablas\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController{
    
    /**
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction(){
        $FuerzaventamenTable = $this->getServiceLocator()
                ->get('Tablas\Model\FuerzaventamenTable');
        $items= $FuerzaventamenTable->findByPosition3();      
        return new ViewModel(array('items'=>$items));
    }    
}