<?php

/*
Title: Design Settings
Setting: dancefloor_settings
Tab: Design
Flow: Dancefloor Workflow
*/

piklist('field', [
  'type'      => 'select',
  'field'     => 'df_display_news_title',
  'value'     => 'yes',
  'label'     => __('Display News title','sage'),
  'choices'   => [
    'yes' => 'yes',
    'non' => 'non',
    ]
]);
