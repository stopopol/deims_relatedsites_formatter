<?php

namespace Drupal\deims_relatedsites_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'DeimsRelatedsitesFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "deims_relatedsites_formatter",
 *   label = @Translation("DEIMS Related Sites Formatter"),
 *   field_types = {
 *  	"entity_reference"
 *   },
 *   quickedit = {
 *     "editor" = "disabled"
 *   }
 * )
 */
 
class DeimsRelatedsitesFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
   
 
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Formats related entites as an unordered list');
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $ul_string = "";
    foreach ($items as $delta => $item) {
		$ul_string = $ul_string . '<li><a href="' . "/" . $item->entity->field_deims_id->value . '">' . $item->entity->get('title')->value . '</a></li>';
    }

	$elements = [
		'#markup' => "<ul>". $ul_string . "</ul>",
	];

    return $elements;

  }
	
}
