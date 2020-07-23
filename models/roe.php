<?php
defined('_JEXEC') or die('Restricted access');
jimport( 'joomla.application.component.model');
class RoeModelRoe extends JModelLegacy{
    function getItemById($id){
        $query = $this->_db->getQuery(true);

        $query
        ->select(array('*'))
        ->from($this->_db->quoteName('#__roe', 'a'))
        ->where($this->_db->quoteName('id') . ' = ' . $this->_db->quote($id));

        $this->_db->setQuery($query);
        return $this->_db->loadObject();
    }
    function getItem($i='', $j='', $id = 0){
        $query = $this->_db->getQuery(true);

        $query
        ->select(array('*'))
        ->from($this->_db->quoteName('#__roe', 'a'))
        ->where($this->_db->quoteName('i') . ' = ' . $this->_db->quote($i))
        ->where($this->_db->quoteName('j') . ' = ' . $this->_db->quote($j));

        $this->_db->setQuery($query);
        return $this->_db->loadObject();
    }
    function getItems(){
        $query = $this->_db->getQuery(true);

        $query
        ->select(array('*'))->from($this->_db->quoteName('#__roe'));

        $this->_db->setQuery($query);
        return $this->_db->loadObjectList();
    }

}