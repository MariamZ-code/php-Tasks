<!-- CRUD Models -->
<?php

// Cuz Any Model has different Implementation so i use ABSTRUCTION 

interface crud {
    function create();
    function read();
    function update();
    function delete();
}
