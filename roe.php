<?php defined( '_JEXEC' ) or die( 'Restricted access' );
//    if (file_exists(JPATH_COMPONENT.'/controller.php'))
//        require_once( JPATH_COMPONENT.'/controller.php' );
//    else
//        JError::raiseError( 403, JText::_('Access Forbidden') );
    $controller = JRequest::getCmd('controller');
    $view = JRequest::getVar('view');

    if($view == 'roe')
        $controller = 'roe';
    

    $path = JPATH_COMPONENT.'/controllers/'.$controller.'.php';
    if (file_exists($path)) {require_once $path;} else {$controller = '';}

    $classname    = 'RoeController'.$controller;
    $controller   = new $classname();

    $controller->execute($view);
    $controller->redirect();