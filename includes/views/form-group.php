<?php
class AikeziSolutionsFormGroup {
    public function aikeziSolutionsCreateGroup($strValue) {
        require_once AIKEZI_S_INCLUDE_DIR . '/views/input-form.php';
        $labelvalue   = get_option('aikezi_s_label');
        $contentvalue = get_option('aikezi_s_content');
        $idValue = $strValue + 1;
        $callObjForm = new AikeziSolutionsInputForm();
        $createForm = '<span class="aikezi_s_form_group">' . 
            $callObjForm -> aikeziSolutionsCreateForm( 'label-info',
                                    'Label',
                                    'text',
                                    'aikezi_s_label[]',
                                    esc_html($labelvalue[$strValue]),
                                    $idtext = '') .
            $callObjForm -> aikeziSolutionsCreateForm( 'content-info',
                                    'Content',
                                    'text',
                                    'aikezi_s_content[]',
                                    esc_html($contentvalue[$strValue]),
                                    $idtext = '') .
            $callObjForm -> aikeziSolutionsCreateForm( 'id-info',
                                    'Info ID',
                                    'hidden',
                                    'aikezi_s_id[]',
                                    $idValue,
                                    $idtext = $idValue) .
            '</span>';
        return $createForm;
    }
}



?>