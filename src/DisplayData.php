<?php

namespace TheRealMVP;

use function Composer\Autoload\includeFile;

class DisplayData
{    
    /**
     * Iterate through each team object to display values and inject html
     *
     * @param  mixed $data
     * 
     * @return string
     */
    public static function displayAllTeams(array $data) : string
    {
        $teamString = '';
        foreach($data as $team) {
            if (
                ($team->getSportId() === $_SESSION['sport'] || $_SESSION['sport'] === "")
                && ($team->getCountryId() === $_SESSION['country'] || $_SESSION['country'] === "")
            ) {
                $teamString .= '<a href="detail.php?team='
                 . $team->getId()
                 . '"><section role="button" tabindex="1"><h2 tabindex="1">'
                 . $team->getName()
                 . '</h2><div class="content"><img tabindex="1" alt="Team logo for '
                 . $team->getName()
                 . '" src="'
                 . $team->getPhoto()
                 . '"/><ul tabindex="1"><li >Sport: '
                 . $team->getSport()
                 . '</li><li>Country: '
                 . $team->getCountry()
                 . '</li><li>Team Colours: '
                 . $team->getTeamColor()
                 . '</li></ul></div></section></a>';
            }
        }
        if ($teamString === '') {
            $teamString = '<div class="noMatch">Nothing matching your request!</div>';
        }
        return $teamString;
    }
}