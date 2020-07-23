<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class RoeRoe extends JTable
{
    function __construct( &$db )
    {
        parent::__construct('#__roe', 'id', $db);
    }
}