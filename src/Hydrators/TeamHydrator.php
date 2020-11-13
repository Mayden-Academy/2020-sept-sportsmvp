<?php

namespace TheRealMVP\Hydrators;
use TheRealMVP\Entities\Team;

class TeamHydrator 
{
    /**
     * create database connection and retrieves data and returns an array of team objects
     *
     * @param $pdoConnection
     *
     * @return array
     */
    public static function getData(\PDO $pdoConnection): array
    {
        $active_query = $pdoConnection->prepare("SELECT teams.`id`, teams.`name`, teams.`photo`, teams.`team_color`, teams.`desc`, sports.`id` AS `sportId`, sports.`name` AS `sport`, countries.`id` as `countryId`, countries.`name` AS `country`
        FROM `teams` 
        INNER JOIN `sports` ON teams.`sport`= sports.`id`
        INNER JOIN `countries` ON teams.`country`=countries.`id`;");
        $active_query->setFetchMode(\PDO::FETCH_CLASS, Team::class);
        $active_query->execute();
        return $active_query->fetchAll();
    }

    /**
     * create database connection and retrieves data and returns a single team object
     *
     * @param int  $id
     *
     * @param \PDO $pdoConnection
     *
     * @return Team
     */
    public static function getTeam(int $id, \PDO $pdoConnection): Team
    {
        $active_query = $pdoConnection->prepare("SELECT teams.`id`, teams.`name`, teams.`photo`, teams.`team_color`, teams.`desc`, sports.`name` AS `sport`, countries.`name` AS `country`
        FROM `teams` 
        INNER JOIN `sports` ON teams.`sport`= sports.`id`
        INNER JOIN `countries` ON teams.`country`=countries.`id`
        WHERE teams.`id` = :id;");
        $active_query->bindParam(':id', $id);
        $active_query->setFetchMode(\PDO::FETCH_CLASS, Team::class);
        $active_query->execute();
        return $active_query->fetch();
    }
}
