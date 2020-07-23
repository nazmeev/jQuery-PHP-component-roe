<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
class RoeControllerRoe extends JControllerLegacy{
    function roe(){
        $starti = JRequest::getInt('starti');
        $startj = JRequest::getInt('startj');
        $limit = 100;

        $view = $this->getView('roe','html');

        $view->assign('starti', $starti);
        $view->assign('startj', $startj);
        $view->assign('stopi', $starti + $limit);
        $view->assign('stopj', $startj + $limit);
        $view->display();
    }
    function edit(){

        echo $i = JRequest::getInt('i');
        echo $j = JRequest::getInt('j');

        $_roe = $this->getModel('roe');
        $item = $_roe->getItem($i, $j);
        
        $view = $this->getView('roe','html');
        $view->setLayout("edit");
        $view->assign("item", $item);
        $view->assign("i", $i);
        $view->assign("j", $j);
        $view->display();
    }
    function save(){
        JRequest::checkToken() or die('Token Error');
        
        $id = JRequest::getInt('id');
        $post = JRequest::get("post");

        JTable::addIncludePath(JPATH_COMPONENT.'/tables');
        $__bond = JTable::getInstance('roe', 'roe');
        $__bond->load($id);
        $__bond->bind($post);
        $__bond->store($post);

        $_roe = $this->getModel('roe');
        $item = $_roe->getItemById($__bond->id);
        $item = json_encode($item);
        $document = JFactory::getDocument();
        $document->addScriptDeclaration('window.parent.updateData('.$item.')');
        
    }
    function remove(){
        $id = JRequest::getInt('id');

        JTable::addIncludePath(JPATH_COMPONENT.'/tables');
        $__bond = JTable::getInstance('bond', 'roe');
        $__bond->delete($id);

        $text = jText::_('DELETED');
        $this->setRedirect(JRoute::_('index.php?option=com_roe&controller=bond&view=bonds', 0), $text);
    }

    function loadData(){
        $_roe = $this->getModel('roe');
        $rows = $_roe->getItems();
        echo json_encode($rows);
        die;
    }
}