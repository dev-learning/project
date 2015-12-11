<?php

namespace Database;

class Create
{
    /**
     * @param string $table
     * @return string
     */
    public static function getQuery($table)
    {
        $sql = "
                CREATE TABLE `" . $table . "` (
                  `ID` INT NOT NULL AUTO_INCREMENT,
                  PRIMARY KEY (`ID`),
                  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC)
                );
        ";
        return $sql;
    }
}