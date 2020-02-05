<?php

use Joomla\CMS\Factory;

defined('_JEXEC') or die('Restricted access');

// Onderstaande regel gebruiken om Helper aan te roepen, 2e regel gebruiken om static function op te halen uit Helper
JLoader::register('BeersHelper', JPATH_ADMINISTRATOR . '/components/com_beers/helpers/beers.php');
//Beershelper::function();


class BeersModelBeers extends JModelItem
{
    public function insertBeers($name, $tagline, $description, $alcohol_percentage)
    {
        $db = Factory::getDbo();
        $query = $db->getQuery(true);

        $columns = [
            'name',
            'tagline',
            'description',
            'alcohol_percentage',
            'rating'
        ];

        $values = [
            $db->quote($name),
            $db->quote($tagline),
            $db->quote($description),
            $db->quote($alcohol_percentage),
            $db->quote(0)
        ];

        $query
            ->insert($db->quoteName('#__beers'))
            ->columns($db->quoteName($columns))
            ->values(implode(',', $values));

        $db->setQuery($query);
        $db->execute();
    }

    /**
     *  Function to retrieve all beers stored in the database
     *
     * @return array of all beers stored in the database
     *
     * */

    public function getBeers()
    {
        $db = $this->getDbo();

        $query = $db->getQuery(true);

        $columns = $db->quoteName([
            'id',
            'name',
            'tagline',
            'description',
            'alcohol_percentage',
            'rating'
        ]);

        $query->select($columns)
            ->from($db->quoteName('#__beers'));

        $db->setQuery($query);


        return $db->loadAssocList();
    }

    /**
     *  Retrieve rows out of database with the same name
     *
     * @param string $name name of beer
     *
     * @return boolean
     * */

    public function getBeersName($name)
    {
        $db = $this->getDbo();

        $query = $db->getQuery(true);

        $query->select($db->quoteName('name'))
            ->from($db->quoteName('#__beers'))
            ->where($db->quoteName('name') . '=' . $db->quote($name));

        $db->setQuery($query);

        return $db->loadColumn();
    }

    /**
     *  Function to check if a row already exists with the same name
     *
     * @return void
     *
     * */

    public function checkBeers()
    {
        $beers = BeersHelper::orderBeers();

        foreach($beers as $beer)
        {
            if($this->getBeersName($beer['name']) == null || empty($this->getBeersName($beer['name'])))
            {
                $this->insertBeers($beer['name'], $beer['tagline'], $beer['description'], $beer['alcohol_percentage']);
            }
        }
    }
}