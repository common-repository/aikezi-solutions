<?php

class AikeziSolutionsInputForm{
    public function __construct($options = null){
    }
    public function aikeziSolutionsCreateForm($class,
                                                    $label,
                                                    $type,
                                                    $name,
                                                    $value,
                                                    $idtext,
                                                    $options = null) {
        require_once AIKEZI_S_INCLUDE_DIR . '/views/input-create.php';
        return AikeziSolutionsInputCreateForm::aikeziSolutionsTextBox($class,
        $label, $type, $name, $value, $idtext, $options);
    }
}


?>