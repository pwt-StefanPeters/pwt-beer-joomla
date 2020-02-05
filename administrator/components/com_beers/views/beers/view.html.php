<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
JLoader::register('BeersHelper', JPATH_ADMINISTRATOR . '/components/com_beers/helpers/beers.php');



/**
 * HTML View class for the Beer Component
 *
 * @since  0.0.1
 */
class BeersViewBeers extends JViewLegacy
{
    /**
     * Display the Hello World view
     *
     * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  void
     */
    public function display($tpl = null)
    {
        // Assign data to the view

        // retrieve model
        $model = $this->getModel('Beers');
//        $this->beers = $this->get('Beers');

//        $this->controllerBier = $model->insertBeers();

        // Calling helper function
//        $this->retrieveBeers = BeersHelper::checkBeers();

        // alle biertjes ophalen
        $this->getBeers = $this->get('Beers');
//        $this->getBeers = 'biertjes ophalen';


        $this->beers = $model->checkBeers();

        $this->createToolbar();
        // Display the view
        parent::display($tpl);
    }

    protected function createToolbar()
    {
        // all toolbar items
        JToolbarHelper::title('Beers');
        JToolbarHelper::addNew('Beers.add', 'Biertjes opnieuw ophalen');
        JToolbarHelper::editList('edit');

    }
}