<?php

class AikeziSolutionsInputCreateForm{
    public static function aikeziSolutionsTextBox(
                                                $class,
                                                $label,
                                                $type,
                                                $name,
                                                $value,
                                                $idtext = '',
                                                $options = null ) {
        $html = '<div class="' . $class . '"><label>' . $label . ':</label>
            <input type="' . $type . '" name="' . $name . '" value="' . $value  . '" /> <p>' . $idtext . '</p>
        </div>';
        return $html;
    }
}


?>