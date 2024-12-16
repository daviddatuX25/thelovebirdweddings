<?php
class Themes extends Database {
    // Create a new theme
    public function createTheme($themeData) {
        $this->query("INSERT INTO themes (theme_name, description) VALUES (:theme_name, :description)");
        $this->bind(":theme_name", $themeData['theme_name']);
        $this->bind(":description", $themeData['description']);
        $this->execute(); // Execute the insert
        return $this->getLastId(); // Return the ID of the newly created theme
    }

    // Read all themes
    public function getThemes(){
        $this->query("SELECT * FROM themes");
        return $this->getResults();
    }

    // Read theme information by ID
    public function getThemeById($themeId) {
        $this->query("SELECT * FROM themes WHERE theme_id = :theme_id");
        $this->bind(":theme_id", $themeId);
        return $this->getResult(); // Return the theme details
    }


    // Update theme information
    public function updateTheme($themeId, $themeData) {
        $this->query("UPDATE themes SET theme_name = :theme_name, description = :description WHERE theme_id = :theme_id");
        $this->bind(":theme_name", $themeData['theme_name']);
        $this->bind(":description", $themeData['description']);
        $this->bind(":theme_id", $themeId);
        $this->execute(); // Execute the update
    }

    // Delete a theme
    public function deleteTheme($themeId) {
        $this->query("DELETE FROM themes WHERE theme_id = :theme_id");
        $this->bind(":theme_id", $themeId);
        $this->execute(); // Execute the delete
    }
}
?>